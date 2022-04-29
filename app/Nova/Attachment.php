<?php

namespace App\Nova;

use App\Nova\Fields\VaporFile;
use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Spatie\TagsField\Tags;

class Attachment extends Resource
{
    public static string $model = \App\Models\Attachment::class;

    public static $title = 'name';

    public static $search = [
        'id',
        'name',
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->hideFromIndex()
            ,
            Text::make(__('Uuid'), 'uuid')
                ->exceptOnForms()
            ,
            VaporFile::make(__('File'), 'file')
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
