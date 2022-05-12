<?php

namespace App\Nova;

use App\Models\ContentLayout as Model;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class ContentLayoutSection extends Resource
{
    public static string $model = Model::class;

    public static $title = 'name';

    public static $search = [
        'name',
    ];

    protected static array $orderBy = ['name' => 'asc'];

    public static function label(): string
    {
        return __('Content Layout Sections');
    }

    public static function singularLabel(): string
    {
        return __('Content Layout Section');
    }

    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable()->showOnPreview(),

            BelongsTo::make(__('Content Layout'), 'contentLayout', ContentLayout::class),

            Text::make(__('Name'), 'name')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),
        ];
    }
}
