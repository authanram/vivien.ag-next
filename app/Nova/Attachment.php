<?php

namespace App\Nova;

use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Spatie\TagsField\Tags;
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
            ,
            Image::make(__('File'), 'file')
                ->rules('required')
            ,
            Text::make(__('Name'), 'name')
                ->rules('required')
                ->sortable()
            ,
            Tags::make('Tags')
                ->type('attachment')
                ->withLinkToTagResource()
                ->hideFromIndex()
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
