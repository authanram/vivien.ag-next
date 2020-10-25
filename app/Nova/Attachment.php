<?php

namespace App\Nova;

use App\Nova\Fields\VaporFile;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Spatie\TagsField\Tags;

class Attachment extends Resource
{
    public static $group = 'System';

    public static $model = \App\Models\Attachment::class;

    public static $title = 'name';

    public static $search = [
        'id',
        'name',
    ];

    final public function fields(Request $request): array
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
}
