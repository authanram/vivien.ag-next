<?php

namespace App\Nova;

use App\Models\ImageCoords as Model;
use Laravel\Nova\Fields\Line;
use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\ID;

class ImageCoords extends Resource
{
    public static string $model = Model::class;

    public static $search = [
        'coords',
    ];

    public static $with = ['image'];

    public static function label(): string
    {
        return __('Image Coords');
    }

    public static function singularLabel(): string
    {
        return __('Image Coord');
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable()->showOnPreview(),

            BelongsTo::make(__('Image'), 'image', Image::class)
                ->withoutTrashed(),

            Code::make(__('Coords'), 'coords')
                ->showOnIndex()
                ->json()
                ->height('auto')
                ->showOnPreview(),

            Line::make(__('Created At'), function () {
                return (string)$this->resource->created_at;
            })->showOnPreview(),
        ];
    }
}
