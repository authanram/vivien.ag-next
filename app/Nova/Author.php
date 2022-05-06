<?php

namespace App\Nova;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Line;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest as Request;

class Author extends Resource
{
    public static string $model = \App\Models\Author::class;

    public static $title = 'name';

    public static $search = [
        'name',
        'occupation',
        'url',
        'quotes.body',
    ];

    public static $with = ['quotes'];

    public function fields(Request $request): array
    {
        return [
            ID::make(__('ID'), 'id')
                ->showOnPreview()
            ,
            Text::make(__('Name'), 'name')
                ->rules('required')
                ->creationRules('unique:authors,name')
                ->updateRules('unique:authors,name,{{resourceId}}')
                ->help('Must be unique.')
                ->sortable()
                ->showOnPreview()
            ,
            Text::make(__('Occupation'), 'occupation')
                ->rules('nullable', 'min:3')
                ->sortable()
                ->showOnPreview()
            ,
            Text::make(__('Url'), 'url')
                ->rules('nullable', 'url')
                ->creationRules('unique:authors,url')
                ->updateRules('unique:authors,url,{{resourceId}}')
                ->help('Must be unique.')
                ->sortable()
                ->showOnPreview()
            ,
            Line::make(__('Quotes'), fn () => $this->resource->quotes->count())
                ->showOnPreview()
            ,
            Boolean::make(__('Published'), 'published')
                ->sortable()
                ->showOnPreview()
            ,
            HasMany::make(__('Quotes'), 'quotes', Quote::class)
            ,
        ];
    }

    public static function label(): string
    {
        return __('Authors');
    }

    public static function singularLabel(): string
    {
        return __('Author');
    }
}
