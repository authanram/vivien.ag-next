<?php

namespace App\Nova;

use App\Models\ImageCoordinate as Model;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Outl1ne\NovaSortable\Traits\HasSortableRows;

class ImageCoordinate extends Resource
{
    use HasSortableRows;

    public static string $model = Model::class;

    public static $search = [
        'data',
    ];

    public static $with = ['image'];

    public static function label(): string
    {
        return __('Image Coordinates');
    }

    public static function singularLabel(): string
    {
        return __('Image Coordinate');
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable()->showOnPreview(),

            BelongsTo::make(__('Image'), 'image', Image::class)
                ->withoutTrashed(),

            Code::make(__('Data'), 'data')
                ->json()
                ->height('auto')
                ->showOnPreview(),

            Text::make(__('Created At'), function () {
                return (string)$this->resource->created_at;
            })->showOnPreview(),

            Text::make(__('Updated At'), function () {
                return (string)$this->resource->updated_at;
            })->showOnPreview(),
        ];
    }
}
