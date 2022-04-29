<?php

namespace App\Nova;

use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
//use OptimistDigital\NovaSortable\Traits\HasSortableRows;

class ImageCoords extends Resource
{
//    use HasSortableRows;

    public static string $model = \App\Models\ImageCoords::class;

    public static $search = [
        'coords',
    ];

    public static array $searchRelations = [
        'image' => ['name'],
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make(__('ID'), 'id')
                ->hideFromIndex()
            ,
            BelongsTo::make(__('Image'), 'image', Image::class)
            ,
            Code::make(__('Coords'), 'coords')
                ->showOnIndex()
                ->default('{}')
                ->json()
                ->height('auto')
            ,
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
