<?php

namespace App\Nova;

use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Slug;
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
                ->showOnPreview()
            ,
            Text::make(__('Name'), 'name')
                ->creationRules('unique:name,uri')
                ->updateRules('unique:routes,name,{{resourceId}}')
                ->rules('required')
                ->sortable()
                ->showOnPreview()
            ,
            Slug::make(__('Uri'), 'uri')
                ->from('title')
                ->creationRules('unique:routes,uri')
                ->updateRules('unique:routes,uri,{{resourceId}}')
                ->rules('required')
                ->sortable()
                ->showOnPreview()
            ,
            Text::make(__('Action'), 'action')
                ->rules('required')
                ->sortable()
                ->showOnPreview()
            ,
            Boolean::make(__('Published'), 'published')
                ->sortable()
                ->showOnPreview()
            ,

            //HasMany::make(__('Menu Items'), 'menuItems', MenuItem::class),

            BelongsToMany::make(__('Content Views'), 'contentViews', ContentView::class)
                ->fields(function () {
                    return [
                        Number::make(__('Order Column'), 'order_column')
                            ->required()
                        ,
                        Boolean::make(__('Published'), 'published')
                        ,
                    ];
                })
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
