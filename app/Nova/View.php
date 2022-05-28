<?php

namespace App\Nova;

use App\Models\View as Model;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class View extends Resource
{
    public static string $model = Model::class;

    public static $title = 'name';

    public static $search = [
        'name',
        'view_alias',
    ];

    protected static array $orderBy = ['name' => 'asc'];

    public static function label(): string
    {
        return __('Views');
    }

    public static function singularLabel(): string
    {
        return __('View');
    }

    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()
                ->sortable()
                ->showOnPreview(),

            Text::make(__('Name'), 'name')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            Text::make(__('View Alias'), 'view_alias')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            Code::make(__('Sections'), 'sections', static fn ($value) => $value ?? '[]')
                ->autoHeight()
                ->json()
                ->rules('required')
                ->showOnPreview(),

            Text::make(__('Sections'), 'sections')
                ->sortable()
                ->onlyOnIndex(),
        ];
    }
}
