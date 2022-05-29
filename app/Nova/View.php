<?php

namespace App\Nova;

use App\Models\View as Model;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\FormData;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Line;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class View extends Resource
{
    public static string $model = Model::class;

    public static $search = [
        'name',
        'view_alias',
    ];

    public static $title = 'name';

    public static function label(): string
    {
        return __('Templates');
    }

    public static function singularLabel(): string
    {
        return __('Template');
    }

    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()
                ->sortable()
                ->showOnPreview(),

            Text::make(__('Name'), 'name')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            Select::make(__('Type'), 'type')
                ->options([
                    'raw' => __('Raw'),
                    'template' => __('Template'),
                ])
                ->displayUsingLabels()
                ->sortable()
                ->showOnPreview(),

            Text::make(__('View Alias'), 'view_alias')
                ->sortable()
                ->hide()
                ->hideFromDetail($this->resource->type !== 'template')
                ->showOnPreview()
                ->dependsOn('type', static function ($field, $request, FormData $formData) {
                    $formData->get('type') === 'template'
                        ? $field->show()->rules('required')
                        : $field->hide()->rules('nullable');
                }),

            ...self::rawField($request, $this->resource),

            ...self::sectionsField($request, $this->resource),

            Line::make(__('Sections'), 'sections')
                ->displayUsing(fn ($value) => $value ? implode(', ', $value) : '—')
                ->sortable()
                ->extraClasses('text-sm')
                ->onlyOnIndex(),
        ];
    }

    private static function rawField(NovaRequest $request, Model $resource): array
    {
        if ($resource->type !== 'raw' && $request->isResourceDetailRequest()) {
            return [];
        }

        return [
            Code::make(__('Raw'), 'raw')
                ->autoHeight()
                ->language('htmlmixed')
                ->hide()
                ->showOnPreview()
                ->dependsOn('type', static function ($field, $request, FormData $formData) {
                    $formData->get('type') === 'raw'
                        ? $field->show()->rules('required')
                        : $field->hide()->rules('nullable');
                }),
        ];
    }

    private static function sectionsField(NovaRequest $request, Model $resource): array
    {
        if ($resource->type !== 'template' && $request->isResourceDetailRequest()) {
            return [];
        }

        return [
            Code::make(__('Sections'), 'sections')
                ->resolveUsing(static fn ($value) => $value === 'null' ? '[]' : $value)
                ->autoHeight()
                ->json()
                ->showOnPreview()
                ->dependsOn('type', static function ($field, $request, FormData $formData) {
                    $formData->get('type') === 'template'
                        ? $field->show()->rules('required')
                        : $field->hide()->rules('nullable');
                }),
        ];
    }
}
