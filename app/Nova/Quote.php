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

    public static $search = [
        'body',
        'author.name',
    ];

    public static $title = 'body';

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
            ID::make()
                ->sortable()
                ->showOnPreview(),

            Text::make(__('Body'), 'body')
                ->help('Use <strong>%s</strong> as line break.')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            BelongsTo::make(__('Author'), 'author', Author::class)
                ->showCreateRelationButton()
                ->withoutTrashed()
                ->sortable()
                ->showOnPreview(),

            Boolean::make(__('Published'), 'published')
                ->sortable()
                ->showOnPreview(),
        ];
    }
}
