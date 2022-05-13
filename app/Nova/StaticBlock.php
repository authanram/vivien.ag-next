<?php

namespace App\Nova;

use App\Models\StaticBlock as Model;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class StaticBlock extends Resource
{
    use HasPivotAttributeSection;

    public static string $model = Model::class;

    public static $title = 'name';

    public static $search = [
        'name',
        'slug',
        'value',
    ];

    protected static array $orderBy = ['name' => 'asc'];

    public static function label(): string
    {
        return __('Static Blocks');
    }

    public static function singularLabel(): string
    {
        return __('Static Block');
    }

    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable()->showOnPreview(),

            Text::make(__('Name'), 'name')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            Slug::make(__('Slug'), 'slug')
                ->from('name')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            Markdown::make(__('Value'), 'value')
                ->alwaysShow()
                ->rules('required')
                ->hideFromIndex()
                ->showOnPreview(),

            BelongsToMany::make(__('Pages'), 'pages', Page::class)
                ->fields(function (NovaRequest $request, $model) {
                    $relatedModel = $request->isUpdateOrUpdateAttachedRequest()
                        ? ContentPage::$model::find($request->relatedResourceId)
                        : $model;

                    return [
                        Select::make(__('Section'), 'section')
                            ->options(self::sections($relatedModel))
                            ->displayUsingLabels()
                            ->rules('required'),
                    ];
                }),
        ];
    }
}
