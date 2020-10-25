<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class Quote extends Resource
{
    public static $model = \App\Models\Quote::class;

    public static $title = 'body';

    public static $search = [
        'id',
        'body',
    ];

    public static $searchRelations = [
        'author' => ['name'],
    ];

    final public function fields(Request $request): array
    {
        return [
            ID::make(__('Id'), 'id')
                ->onlyOnDetail()
            ,
            Text::make(__('Uuid'), 'uuid')
                ->onlyOnDetail()
            ,
            Text::make(__('Body'), 'body')
                ->rules('required')
                ->sortable()
                ->help('Use <strong>%s</strong> as line break.')
            ,
            BelongsTo::make(__('Author'), 'author', Author::class)
                ->showCreateRelationButton()
                ->withoutTrashed()
                ->sortable()
            ,
            Boolean::make(__('Published'), 'published')
                ->sortable()
            ,
        ];
    }
}
