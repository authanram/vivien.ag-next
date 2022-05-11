<?php

namespace App\Nova;

use App\Models\ContentView as Model;
use Exception;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Markdown;
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
                ->addLayout(__('Layout'), 'layout', self::fieldsLayout())
                ->addLayout(__('Markdown'), 'markdown', self::fieldsMarkdown()),

            BelongsToMany::make(__('Content Blocks'), 'contentBlocks', ContentBlock::class),
        ];
    }

    private static function fieldsLayout(): array
    {
        return [
            Text::make(__('Name'), 'name')
                ->rules('required'),

            Code::make(__('Value'), 'value', fn ($value) => $value ?? '%blocks%')
                ->language('htmlmixed')
                ->autoHeight()
                ->rules('required'),
        ];
    }

    private static function fieldsMarkdown(): array
    {
        return [
            Text::make(__('Name'), 'name')
                ->rules('required'),

            Markdown::make('Value', 'value')
                ->rules('required')
                ->alwaysShow(),
        ];
    }
}
