<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class ContentView extends Resource
{
    use HasViewBlocksPivotFields;

    public static string $model = \App\Models\ContentView::class;

    public static $title = 'slug';

    public static $search = [
        'slug',
    ];

    protected static array $orderBy = ['slug' => 'asc'];

    public static function label(): string
    {
        return __('Views');
    }

    public static function singularLabel(): string
    {
        return __('Views');
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()
                ->showOnPreview()
            ,
            Text::make(__('Slug'), 'slug')
                ->rules('required')
                ->sortable()
                ->showOnPreview()
            ,
            BelongsTo::make(__('Extends'), 'contentView', __CLASS__)
                ->showCreateRelationButton()
                ->showOnPreview()
            ,
            Code::make(__('Body'), 'body')
                ->required()
                ->language('xml')
                ->autoHeight()
                ->hideFromIndex()
                ->showOnPreview()
            ,
            BelongsToMany::make(__('Content Blocks'), 'contentBlocks', ContentBlock::class)
                ->fields(fn () => $this->getViewBlocksPivotFields())
            ,
        ];
    }
}
