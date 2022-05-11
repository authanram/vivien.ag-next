<?php

namespace App\Nova;

use App\Models\ContentBlockMarkdown as Model;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Http\Requests\NovaRequest;

class ContentBlockMarkdown extends ContentBlock
{
    public static string $model = Model::class;

    protected static function blockFields(NovaRequest $request): array
    {
        return [
            Markdown::make(__('Value'), 'value')
                ->alwaysShow()
                ->rules('required')
                ->hideFromIndex()
                ->showOnPreview(),
        ];
    }
}
