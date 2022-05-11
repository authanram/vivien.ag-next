<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class ContentComponent extends Resource
{
    use HasViewBlocksPivotFields;

    public static string $model = \App\Models\ContentComponent::class;

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
            Text::make(__('Name'), 'name')
                ->rules('required')
                ->sortable()
                ->showOnPreview()
            ,
            Text::make(__('Model'), 'model')
                ->rules('required')
                ->sortable()
                ->showOnPreview()
            ,
            Text::make(__('Columns'), 'columns')
                ->rules('required')
                ->sortable()
                ->showOnPreview()
            ,
            Code::make(__('View'), 'view')
                ->language('htmlmixed')
                ->autoHeight()
                ->rules('required')
                ->hideFromIndex()
                ->showOnPreview()
            ,
        ];
    }
}
