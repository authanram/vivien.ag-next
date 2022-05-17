<?php

namespace App\Nova;

use App\Models\Page as Model;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Page extends Resource
{
    public static string $model = Model::class;

    public static $title = 'name';

    public static $with = ['staticBlocks'];

    public static $search = [
        'name',
    ];

    protected static array $orderBy = ['name' => 'asc'];

    public static function label(): string
    {
        return __('Pages');
    }

    public static function singularLabel(): string
    {
        return __('Page');
    }

    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable()->showOnPreview(),

            Text::make(__('Name'), 'name')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            BelongsToMany::make(__('Static Blocks'), 'staticBlocks', StaticBlock::class)
                ->fields(fn () => [
                    Text::make(__('Slug'), 'slug')
                        ->rules('required', 'alpha_dash')
                        ->showOnPreview(),
                ]),
        ];
    }
}
