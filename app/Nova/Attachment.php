<?php

namespace App\Nova;

use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;

class Attachment extends Resource
{
    public static string $model = \App\Models\Attachment::class;

    public static $title = 'name';

    public static $search = [
        'name',
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()
                ->showOnPreview()
            ,
            Image::make(__('File'), 'file')
                ->rules('required')
                ->showOnPreview()
            ,
            Text::make(__('Name'), 'name')
                ->rules('required')
                ->sortable()
                ->showOnPreview()
            ,
        ];
    }

    public static function label(): string
    {
        return __('Attachments');
    }

    public static function singularLabel(): string
    {
        return __('Attachment');
    }
}
