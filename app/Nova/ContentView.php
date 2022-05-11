<?php

namespace App\Nova;

use App\Models\ContentView as Model;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\Field;
use Laravel\Nova\Http\Requests\NovaRequest;

class ContentView extends ContentBlock
{
    public static string $model = Model::class;

    public static function indexQuery(NovaRequest $request, $query): Builder
    {
        return parent::indexQuery($request, $query)->where('type', Model::class);
    }

    public static function label(): string
    {
        return __('Content Views');
    }

    public static function singularLabel(): string
    {
        return __('Content View');
    }

    protected function fieldBody(NovaRequest $request): Field
    {
        return Code::make(__('Html'), 'body', static fn ($value) => $value ?? '')
            ->autoHeight()
            ->language('htmlmixed')
            ->rules('required')
            ->hideFromIndex()
            ->showOnPreview();
    }
}
