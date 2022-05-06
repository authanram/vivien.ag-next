<?php

namespace App\Nova;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image as FieldImage;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest as Request;

class Image extends Resource
{
    public static string $model = \App\Models\Image::class;

    public static $title = 'name';

    public static $search = [
        'name',
        'description',
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make(__('ID'), 'id')
                ->showOnPreview()
            ,
            FieldImage::make(__('File'), 'file')
                ->disk('public')
                ->path('image')
                ->storeOriginalName('file_original')
                ->rules('required')
                ->hideWhenUpdating()
                ->showOnPreview()
            ,
            Text::make(__('Name'), 'name')
                ->rules('required')
                ->sortable()
                ->showOnPreview()
            ,
            Textarea::make(__('Description'), 'description')
                ->rows(2)
                ->showOnPreview()
            ,
            Currency::make(__('Price'), 'price')
                ->currency('EUR')
                ->sortable()
                ->showOnPreview()
            ,
            Boolean::make(__('Published'), 'published')
                ->sortable()
                ->showOnPreview()
            ,
            HasOne::make(__('Image Coords'), 'imageCoords', ImageCoords::class)
            ,
        ];
    }

    public static function label(): string
    {
        return __('Images');
    }

    public static function singularLabel(): string
    {
        return __('Image');
    }
}
