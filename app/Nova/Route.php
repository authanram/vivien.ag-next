<?php

namespace App\Nova;

use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class Route extends Resource
{
    public static string $model = \App\Models\Route::class;

    public static $title = 'title';

    public static $search = [
        'path',
        'route',
        'action',
        'title',
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make(__('ID'), 'id')
            ,
            Text::make(__('Path'), 'path')
                ->creationRules('unique:routes,path')
                ->updateRules('unique:routes,path,{{resourceId}}')
                ->rules('required')
                ->sortable()
            ,
            Text::make(__('Route'), 'route')
                ->creationRules('unique:routes,route')
                ->updateRules('unique:routes,route,{{resourceId}}')
                ->rules('required')
                ->sortable()
            ,
            Text::make(__('Action'), 'action')
                ->rules('required')
                ->sortable()
            ,
            Text::make(__('Title'), 'title')
                ->rules('required')
                ->sortable()
            ,
            Boolean::make(__('Published'), 'published')
                ->rules('required')
                ->sortable()
            ,
            HasMany::make(__('Menu Items'), 'menuItems', MenuItem::class)
            ,
            BelongsToMany::make(__('Content Views'), 'contentViews', ContentView::class)
            ,
            BelongsToMany::make(__('Contents'), 'contents', Content::class)
            ,
        ];
    }

    public static function label(): string
    {
        return __('Routes');
    }

    public static function singularLabel(): string
    {
        return __('Route');
    }
}
