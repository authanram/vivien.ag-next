<?php

namespace App\Nova;

use App\Models\ContentView as Model;
use Exception;
use Illuminate\Support\Str;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\Field;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaFlexibleContent\Flexible;

class ContentView extends Resource
{
    public static string $model = Model::class;

    public static $title = 'name';

    public static $search = [
        'name',
        'sections',
    ];

    protected static array $orderBy = ['name' => 'asc'];

    public static function label(): string
    {
        return __('Content Views');
    }

    public static function singularLabel(): string
    {
        return __('Content View');
    }

    /**
     * @throws Exception
     */
    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable()->showOnPreview(),

            Text::make(__('Name'), 'name')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            Flexible::make(__('Section'), 'sections')
                ->button(__('Add Section'))
                ->confirmRemove()
                ->addLayout(__('Layout'), 'layout', self::fieldsLayout($request))
                ->addLayout(__('Markdown'), 'markdown', self::fieldsMarkdown($request))
                ->hideFromDetail(),

            ...self::fieldsDetail($request, $this->resource),

            BelongsToMany::make(__('Content Blocks'), 'contentBlocks', ContentBlock::class)
                ->fields(fn ($request, $model) => [
                    Select::make(__('Section'), 'section')
                        ->options(self::sections($this->resource))
                        ->displayUsingLabels(),
                ]),
        ];
    }

    private static function fieldsLayout(NovaRequest $request): array
    {
        return [
            self::fieldsCustom($request, 'name'),
            self::fieldsCustom($request, 'layout'),
        ];
    }

    private static function fieldsMarkdown(NovaRequest $request): array
    {
        return [
            self::fieldsCustom($request, 'name'),
            self::fieldsCustom($request, 'markdown'),
        ];
    }

    private static function fieldsCustom(NovaRequest $request, string $name): Field
    {
        return [
            'name' => Text::make(__('Name'), 'name')
                ->rules('required'),

            'layout' => Code::make(__('Value'), 'value', fn ($value) => $value ?? '%blocks%')
                ->language('htmlmixed')
                ->autoHeight()
                ->rules('required'),

            'markdown' => Markdown::make('Value', 'value')
                ->rules('required')
                ->alwaysShow(),
        ][$name];
    }

    private static function fieldsDetail(NovaRequest $request, Model $resource): array
    {
        return collect($resource->sections)
            ->map(fn (array $section) => self::fieldsCustom($request, $section['layout'])
                ->resolveUsing(fn () => $section['attributes']['value'])
                ->withMeta(['name' => self::sectionName($section)])
                ->onlyOnDetail()
                ->showOnPreview()
            )->toArray();
    }

    private static function sections(Model $resource): array
    {
        return collect($resource->sections)->mapWithKeys(function (array $section) {
            return [$section['attributes']['name'] => self::sectionName($section)];
        })->toArray();
    }

    private static function sectionName(array $section): string
    {
        return __(Str::of($section['attributes']['name'])->title()->toString());
    }
}
