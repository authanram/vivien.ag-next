<?php

namespace App\Nova;

use App\Models\Menu as Model;
use Laravel\Nova\Fields\Line;
use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class Menu extends Resource
{
    public static string $model = Model::class;

    public static $title = 'slug';

    public static $search = [
        'slug',
    ];

    public static $with = [
        'menuItems:menu_id',
    ];

    public static function label(): string
    {
        return __('Menus');
    }

    public static function singularLabel(): string
    {
        return __('Menu');
    }

    public function fields(Request $request): array
    {
        $table = $this->model()?->getTable();

        return [
            ID::make()
                ->sortable()
                ->showOnPreview(),

            Text::make(__('Slug'), 'slug')
                ->creationRules('required', "unique:$table,slug")
                ->updateRules('required', "unique:$table,slug,{{resourceId}}")
                ->sortable()
                ->showOnPreview(),

            Line::make(__('Menu Items'), fn () => $this->resource->menuItems->count())
                ->extraClasses('text-sm'),

            Boolean::make(__('Published'), 'published')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            HasMany::make(__('Menu Items'), 'menuItems', MenuItem::class),
        ];
    }
}
