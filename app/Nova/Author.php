<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Saumini\Count\RelationshipCount;

class Author extends Resource
{
    public static $model = \App\Models\Author::class;

    public static $title = 'name';

    public static $search = [
        'id',
        'name',
        'occupation',
        'url',
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
            Text::make(__('Name'), 'name')
                ->rules('required')
                ->creationRules('unique:authors,name')
                ->updateRules('unique:authors,name,{{resourceId}}')
                ->help('Must be unique.')
                ->sortable()
            ,
            Text::make(__('Occupation'), 'occupation')
                ->rules('nullable', 'min:3')
                ->sortable()
            ,
            Text::make(__('Url'), 'url')
                ->rules('nullable', 'url')
                ->creationRules('unique:authors,url')
                ->updateRules('unique:authors,url,{{resourceId}}')
                ->help('Must be unique.')
                ->sortable()
            ,
            RelationshipCount::make(__('Quotes'), 'quotes')
            ,
            Boolean::make(__('Published'), 'published')
                ->sortable()
            ,
            HasMany::make(__('Quotes'), 'quotes', Quote::class)
            ,
        ];
    }

    final public static function label(): string
    {
        return __('Authors');
    }

    final public static function singularLabel(): string
    {
        return __('Author');
    }
}
