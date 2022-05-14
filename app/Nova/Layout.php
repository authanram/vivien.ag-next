<?php

namespace App\Nova;

use App\Models\Layout as Model;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Layout extends Resource
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
        return __('Layouts');
    }

    public static function singularLabel(): string
    {
        return __('Layout');
    }

    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable()->showOnPreview(),

            Text::make(__('Name'), 'name')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            Text::make(__('View Alias'), 'view_alias')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            Text::make(__('Sections'), 'sections', self::sectionsValue($request))
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            HasMany::make(__('Pages'), 'pages', Page::class),
        ];
    }

    private static function sectionsValue(NovaRequest $request): callable
    {
        return static fn ($value) => implode(
            ($request->isResourceIndexRequest() ? ', ' : ','),
            $value,
        );
    }
}
