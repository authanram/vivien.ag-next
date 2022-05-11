<?php

namespace App\Nova;

use App\Models\ContentBlockHtml as Model;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Http\Requests\NovaRequest;

class ContentBlockHtml extends ContentBlock
{
    public static string $model = Model::class;

    protected static function blockFields(NovaRequest $request): array
    {
        return [
            Code::make(__('Value'), 'value')
                ->language('htmlmixed')
                ->autoHeight()
                ->rules('required')
                ->hideFromIndex()
                ->showOnPreview(),
        ];
    }
}
