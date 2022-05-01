<?php

namespace App\Nova;

use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class Menu extends Resource
{
    public static string $model = \App\Models\Menu::class;

    public static $title = 'slug';

    public static $search = [
        'slug',
    ];

    public static $with = [
        'menuItems',
        'menuItems.menu',
        'menuItems.route',
    ];

    public function fields(Request $request): array
    {
        $table = $this->model()?->getTable();

        return [
            ID::make(__('ID'), 'id')
            ,
            Text::make(__('Slug'), 'slug')
                ->creationRules("unique:$table,slug")
                ->updateRules("unique:$table,slug,{{resourceId}}")
                ->sortable()
            ,
            Boolean::make(__('Published'), 'published')
                ->rules('required')
                ->sortable()
            ,
            HasMany::make(__('Menu Items'), 'menuItems', MenuItem::class)
            ,
        ];
    }

    public static function label(): string
    {
        return __('Menus');
    }

    public static function singularLabel(): string
    {
        return __('Menus');
    }
}
