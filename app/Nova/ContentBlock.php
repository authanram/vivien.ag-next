<?php

namespace App\Nova;

use Laravel\Nova\Fields\Hidden;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

abstract class ContentBlock extends Resource
{
    public static $title = 'name';

    public static $search = [
        'name',
        'slug',
    ];

    protected static array $orderBy = ['name' => 'asc'];

    abstract protected static function blockFields(NovaRequest $request);

    public static function label(): string
    {
        return __('Content Blocks');
    }

    public static function singularLabel(): string
    {
        return __('Content Block');
    }

    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable()->showOnPreview(),

            Hidden::make(__('Type'), 'type')
                ->default(static fn () => static::class),

            Text::make(__('Name'), 'name')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            Slug::make(__('Slug'), 'slug')
                ->from('name')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            ...static::blockFields($request),
        ];
    }
}
