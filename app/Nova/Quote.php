<?php

namespace App\Nova;

use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class Quote extends Resource
{
    public static string $model = \App\Models\Quote::class;

    public static $title = 'body';

    public static $search = [
        'body',
    ];

    public static array $searchRelations = [
        'author' => ['name'],
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make(__('ID'), 'id')
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

    public static function label(): string
    {
        return __('Quotes');
    }

    public static function singularLabel(): string
    {
        return __('Quote');
    }
}
