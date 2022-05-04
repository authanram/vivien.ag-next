<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Text;

class ContentBlock extends Resource
{
    public static string $model = \App\Models\ContentBlock::class;

    public static $title = 'slug';

    public static $search = [
        'slug',
    ];

    protected static array $orderBy = ['slug' => 'asc'];

    public static function label(): string
    {
        return __('Blocks');
    }

    public static function singularLabel(): string
    {
        return __('Block');
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()
            ,
            Text::make(__('Slug'), 'slug')
                ->rules('required')
                ->sortable()
            ,
            Markdown::make(__('Body'), 'body')
                ->required()
                ->hideFromIndex()
            ,
            BelongsToMany::make(__('Content Views'), 'contentViews', ContentView::class)
            ,
        ];
    }
}
