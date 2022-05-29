<?php

namespace App\Nova;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image as FieldImage;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Outl1ne\NovaSortable\Traits\HasSortableRows;

class Image extends Resource
{
    use HasSortableRows;

    public static string $model = \App\Models\Image::class;

    public static $title = 'name';

    public static $search = [
        'name',
        'description',
    ];

    protected static array $orderBy = [
        'order_column' => 'asc',
        'name' => 'asc',
    ];

    public static function label(): string
    {
        return __('Images');
    }

    public static function singularLabel(): string
    {
        return __('Image');
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()
                ->sortable()
                ->showOnPreview(),

            FieldImage::make(__('File'), 'file')
                ->disk('public')
                ->path('image')
                ->storeOriginalName('file_original')
                ->rules('required')
                ->hideWhenUpdating()
                ->sortable()
                ->showOnPreview(),

            Text::make(__('Name'), 'name')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            Textarea::make(__('Description'), 'description')
                ->rows(2)
                ->showOnPreview(),

            Currency::make(__('Price'), 'price')
                ->currency('EUR')
                ->sortable()
                ->showOnPreview(),

            Boolean::make(__('Published'), 'published')
                ->sortable()
                ->showOnPreview(),
        ];
    }
}
