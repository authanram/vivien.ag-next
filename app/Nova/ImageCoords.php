<?php

namespace App\Nova;

use Laravel\Nova\Fields\Line;
use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\ID;

class ImageCoords extends Resource
{
    public static string $model = \App\Models\ImageCoords::class;

    public static $search = [
        'coords',
    ];

    public static array $searchRelations = [
        'image' => ['name'],
    ];

    public static $with = ['image'];

    public function fields(Request $request): array
    {
        return [
            ID::make(__('ID'), 'id')
            ,
            BelongsTo::make(__('Image'), 'image', Image::class)
            ,
            Code::make(__('Coords'), 'coords')
                ->showOnIndex()
                ->json()
                ->height('auto')
            ,
            Line::make(__('Created At'), function () {
                return (string)$this->resource->created_at;
            }),
        ];
    }

    public static function label(): string
    {
        return __('Image Coords');
    }

    public static function singularLabel(): string
    {
        return __('Image Coord');
    }
}
