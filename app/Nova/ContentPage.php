<?php

namespace App\Nova;

use App\Models\ContentPage as Model;
use Exception;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class ContentPage extends Resource
{
    use HasPivotAttributeSection;

    public static string $model = Model::class;

    public static $title = 'name';

    public static $search = [
        'name',
        'sections',
    ];

    protected static array $orderBy = ['name' => 'asc'];

    public static function label(): string
    {
        return __('Content Pages');
    }

    public static function singularLabel(): string
    {
        return __('Content Page');
    }

    /**
     * @throws Exception
     */
    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable()->showOnPreview(),

            Text::make(__('Name'), 'name')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            ...ContentLayoutSectionFieldsCreator::make($this->resource),

            BelongsToMany::make(__('Content Layout Section'), 'contentLayoutSections', ContentLayoutSection::class)
                ->fields(fn ($request, $model) => [
                    ContentLayoutSectionFieldsCreator::makeFieldSelection(),
                ]),

            BelongsToMany::make(__('Content Blocks'), 'contentBlocks', ContentBlock::class)
                ->fields(fn ($request, $model) => [
                    Select::make(__('Section'), 'section')
                        ->options([])
                        ->displayUsingLabels()
                        ->rules('required'),
                ]),
        ];
    }
}
