<?php

namespace App\Nova;

use App\Models\Attachment as Model;
use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;

class Attachment extends Resource
{
    public static string $model = Model::class;

    public static $title = 'name';

    public static $search = [
        'name',
    ];

    public static function label(): string
    {
        return __('Attachments');
    }

    public static function singularLabel(): string
    {
        return __('Attachment');
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable()->showOnPreview(),

            Image::make(__('File'), 'file')
                ->rules('required')
                ->showOnPreview(),

            Text::make(__('Name'), 'name')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),
        ];
    }
}
