<?php

namespace App\Nova;

use App\Models\ImageCoordinate as Model;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Outl1ne\NovaSortable\Traits\HasSortableRows;

class ImageCoordinate extends Resource
{
    use HasFieldOrderColumn;
    use HasSortableRows;

    public static string $model = Model::class;

    protected static array $orderBy = [
        'order_column' => 'asc',
    ];

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
            ID::make()
                ->sortable()
                ->showOnPreview(),

            Code::make(__('Data'), 'data')
                ->autoHeight()
                ->json()
                ->rules('json')
                ->showOnPreview(),

            Text::make(__('Created At'), fn () => (string)$this->resource->created_at)
                ->sortable()
                ->showOnPreview(),

            Text::make(__('Updated At'), fn () => (string)$this->resource->updated_at)
                ->sortable()
                ->showOnPreview(),
        ];
    }
}
