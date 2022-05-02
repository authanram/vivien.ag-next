<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class ContentLayout extends Resource
{
    public static string $model = \App\Models\ContentLayout::class;

    public static $title = 'slug';

    public static $search = [
        'slug',
        'value',
    ];

    protected static array $orderBy = ['slug' => 'asc'];

    public static function label(): string
    {
        return __('Layouts');
    }

    public static function singularLabel(): string
    {
        return __('Layout');
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
            Code::make(__('Value'), 'value')
                ->language('html')
                ->height('auto')
                ->rules('required')
                ->hideFromIndex()
            ,
            HasMany::make(__('Blocks'), 'blocks', ContentBlock::class)
            ,
        ];
    }
}
