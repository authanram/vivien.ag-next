<?php

namespace App\Nova;

use App\Models\Page as Model;
use App\Models\PageSection as ModelPageSection;
use Exception;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Line;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Nova;

class Page extends Resource
{
    public static string $model = Model::class;

    public static $title = 'name';

    public static $with = ['layout', 'pageSections', 'staticBlocks'];

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

    /**
     * @throws Exception
     */
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

            BelongsTo::make(__('Layout'), 'layout')
                ->sortable()
                ->showOnPreview(),

            HasMany::make('Sections', 'pageSections', PageSection::class),

            Line::make('Sections', 'pageSections', static function (Collection $value) {
                return $value
                    ->sortBy('name')
                    ->map(function (ModelPageSection $pageSection) {
                        $resourceUrl = Nova::path().'/resources/'.PageSection::uriKey().'/'.$pageSection->id;
                        return '<a href="'.$resourceUrl.'" class="link-default">'.$pageSection->name.'</a>';
                    })->implode(', ');
            })->asHtml()->showOnPreview(),

            BelongsToMany::make(__('Static Blocks'), 'staticBlocks', StaticBlock::class)
                ->fields(fn () => [
                    Text::make(__('Slug'), 'slug')
                        ->rules('required', 'alpha_dash')
                        ->sortable()
                        ->showOnPreview(),
                ]),
        ];
    }
}
