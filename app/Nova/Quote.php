<?php

namespace App\Nova;

use App\Models\Quote as Model;
use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class Quote extends Resource
{
    public static string $model = Model::class;

    public static $title = 'body';

    public static $search = [
        'body',
        'author.name',
    ];

    public static function label(): string
    {
        return __('Quotes');
    }

    public static function singularLabel(): string
    {
        return __('Quote');
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable()->showOnPreview(),

            Text::make(__('Body'), 'body')
                ->rules('required')
                ->sortable()
                ->help('Use <strong>%s</strong> as line break.')
                ->showOnPreview(),

            BelongsTo::make(__('Author'), 'author', Author::class)
                ->showCreateRelationButton()
                ->withoutTrashed()
                ->sortable(),

            Boolean::make(__('Published'), 'published')
                ->sortable()
                ->showOnPreview(),

        ];
    }
}
