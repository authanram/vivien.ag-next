<?php

namespace App\Nova;

use App\Models\Route as Model;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest as Request;

class Route extends Resource
{
    public static string $model = Model::class;

    public static $title = 'name';

    public static $with = ['contentView'];

    public static $search = [
        'name',
        'uri',
    ];

    public static function label(): string
    {
        return __('Routes');
    }

    public static function singularLabel(): string
    {
        return __('Route');
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()
                ->showOnPreview(),

            Text::make(__('Name'), 'name')
                ->creationRules('required', 'unique:name,uri')
                ->updateRules('required', 'unique:routes,name,{{resourceId}}')
                ->sortable()
                ->showOnPreview(),

            Slug::make(__('Uri'), 'uri')
                ->from('name')
                ->creationRules('required', 'unique:routes,uri')
                ->updateRules('required', 'unique:routes,uri,{{resourceId}}')
                ->sortable()
                ->showOnPreview(),

            BelongsTo::make(__('Content View'), 'contentView', ContentView::class)
                ->showCreateRelationButton()
                ->withoutTrashed(),

            Boolean::make(__('Published'), 'published')
                ->sortable()
                ->showOnPreview(),
        ];
    }
}
