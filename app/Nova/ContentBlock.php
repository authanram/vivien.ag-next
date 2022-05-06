<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Text;

class ContentBlock extends Resource
{
    use HasViewBlocksPivotFields;

    public static string $model = \App\Models\ContentBlock::class;

    public static $title = 'name';

    public static $search = [
        'name',
    ];

    protected static array $orderBy = ['name' => 'asc'];

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
                ->showOnPreview()
            ,

            Text::make(__('Name'), 'name')
                ->rules('required')
                ->sortable()
                ->showOnPreview()
            ,

            Markdown::make(__('Title'), 'title')
                ->alwaysShow()
                ->hideFromIndex()
                ->showOnPreview()
            ,

            Markdown::make(__('Body'), 'body')
                ->required()
                ->alwaysShow()
                ->hideFromIndex()
                ->showOnPreview()
            ,

            BelongsToMany::make(__('Content Views'), 'contentViews', ContentView::class)
                ->fields(fn () => $this->getViewBlocksPivotFields())
            ,

        ];
    }
}
