<?php

namespace App\Nova;

use App\Models\Layout;
use App\Models\Page as Model;
use Exception;
use Illuminate\Support\Str;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\FormData;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class Page extends Resource
{
    public static string $model = Model::class;

    public static $title = 'name';

    public static $with = ['layout', 'staticBlocks'];

    public static $search = [
        'name',
        'layout',
    ];

    protected static array $orderBy = ['name' => 'asc'];

    protected ?array $f = null;

    public static function label(): string
    {
        return __('Pages');
    }

    public static function singularLabel(): string
    {
        return __('Page');
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

            BelongsTo::make(__('Layout'), 'layout')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            ...$this->sectionFields($request),

            BelongsToMany::make(__('Static Blocks'), 'staticBlocks', StaticBlock::class)
                ->fields(fn () => [
                    Text::make(__('Slug'), 'slug')
                        ->rules('required', 'alpha_dash')
                        ->showOnPreview(),
                ]),
        ];
    }

    private function sectionFields($request): array
    {
        return collect($this->sections($request))
            ->map(fn (string $section) => Panel::make(
                Str::of($section)->title()->prepend('Section: ')->toString(),
                [
                    Select::make(__('Field Type'), 'sections->'.$section.'->type')
                        ->options(['html' => 'HTML', 'markdown' => 'Markdown']),

                    Code::make(__('Value'), 'sections->'.$section.'->value')
                        ->autoHeight()
                        ->language('htmlmixed')
                        ->hide()
                        ->dependsOn(
                            ['layout', 'sections->'.$section.'->type'],
                            function (Code $field, NovaRequest $request) use ($section) {
                                if ($request->get('sections->'.$section.'->type') === 'html') {
                                    $field->show();
                                }
                            }
                        ),

                    Markdown::make(__('Value'), 'sections->'.$section.'->value')
                        ->hide()
                        ->dependsOn(
                            ['layout', 'sections->'.$section.'->type'],
                            function (Markdown $field, NovaRequest $request) use ($section) {
                                if ($request->get('sections->'.$section.'->type') === 'markdown') {
                                    $field->show();
                                }
                            }
                        ),
                ]),
            )->toArray();
    }

    private function sections(NovaRequest $request): array
    {
        $layoutId = $this->resource->layout_id
            ?? $request->get('current')
            ?? $request->json('layout');

        return Layout::find($layoutId)->sections ?? [];
    }
}
