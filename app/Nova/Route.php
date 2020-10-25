<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class Route extends Resource
{
    public static $group = 'Routing';

    public static $model = \App\Models\Route::class;

    public static $title = 'title';

    public static $search = [
        'id',
        'path',
        'route',
        'action',
        'title',
    ];

    final public function fields(Request $request): array
    {
        return [
            ID::make(__('Id'), 'id')
                ->onlyOnDetail()
            ,
            Text::make(__('Uuid'), 'uuid')
                ->onlyOnDetail()
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
            BelongsToMany::make(__('Contents'), 'contents', Content::class)
            ,
        ];
    }

    final public static function label(): string
    {
        return __('Routes');
    }

    final public static function singularLabel(): string
    {
        return __('Route');
    }
}
