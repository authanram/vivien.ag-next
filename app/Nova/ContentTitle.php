<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Markdown;

class ContentTitle extends Resource
{
    use HasViewBlocksPivotFields;

    public static string $model = \App\Models\ContentTitle::class;

    public static function label(): string
    {
        return __('Content Titles');
    }

    public static function singularLabel(): string
    {
        return __('Content Title');
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()
                ->showOnPreview()
            ,

            Markdown::make(__('Body'), 'body')
                ->required()
                ->alwaysShow()
                ->hideFromIndex()
                ->showOnPreview()
            ,

            BelongsTo::make(__('Content Block'), 'contentBlock', ContentBlock::class)
            ,

        ];
    }
}
