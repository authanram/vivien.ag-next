<?php

namespace App\Nova;

use App\Models\ContentLayout as Model;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class ContentLayout extends Resource
{
    public static string $model = Model::class;

    public static $title = 'name';

    public static $search = [
        'name',
        'view_alias',
    ];

    protected static array $orderBy = ['name' => 'asc'];

    public static function label(): string
    {
        return __('Content Layouts');
    }

    public static function singularLabel(): string
    {
        return __('Content Layout');
    }

    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable()->showOnPreview(),

            Text::make(__('Name'), 'name')
                ->creationRules('required', 'unique:content_layouts,name')
                ->updateRules('required', 'unique:content_layouts,name,{{resourceId}}')
                ->sortable()
                ->showOnPreview(),

            Text::make(__('View Alias'), 'view_alias')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            HasMany::make(__('Content Layout Sections'), 'contentLayoutSections', ContentLayoutSection::class),
        ];
    }
}
