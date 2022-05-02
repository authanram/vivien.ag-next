<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class ContentField extends Resource
{
    public static string $model = \App\Models\ContentField::class;

    public static $title = 'slug';

    public static $search = [
        'slug',
        'type',
    ];

    protected static array $orderBy = ['slug' => 'asc'];

    public static function label(): string
    {
        return __('Fields');
    }

    public static function singularLabel(): string
    {
        return __('Field');
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
            Text::make(__('Type'), 'type')
                ->rules('required')
                ->sortable()
            ,
            BelongsToMany::make(__('Blocks'), 'blocks', ContentBlock::class)
            ,
        ];
    }
}
