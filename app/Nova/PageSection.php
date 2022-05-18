<?php

namespace App\Nova;

use App\Models\Page as PageModel;
use App\Models\PageSection as Model;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Http\Requests\NovaRequest;

class PageSection extends Resource
{
    public static string $model = Model::class;

    public static $title = 'name';

    public static $with = ['page', 'page.layout'];

    public static function label(): string
    {
        return __('Page Sections');
    }

    public static function singularLabel(): string
    {
        return __('Page Section');
    }

    public function fields(NovaRequest $request): array
    {
        $sections = is_null($request->get('viaResourceId')) === false
            ? PageModel::with('layout')
                ->find($request->get('viaResourceId'))
                ?->getRelation('layout')
                ?->getAttribute('sections')
            : [];

        return [
            ID::make()
                ->sortable()
                ->showOnPreview(),

            BelongsTo::make(__('Page'), 'page', Page::class)
                ->withoutTrashed()
                ->hideFromIndex()
                ->showOnPreview(),

            Select::make(__('Layout Section'), 'layout_section')
                ->options(array_combine($sections, $sections))
                ->displayUsingLabels()
                ->sortable()
                ->showOnPreview(),

            Slug::make(__('Page Section'), 'name')
                ->from('layout_section')
                ->rules('required', 'alpha')
                ->sortable()
                ->showOnPreview(),
        ];
    }
}
