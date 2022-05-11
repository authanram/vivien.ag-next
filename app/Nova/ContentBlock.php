<?php

namespace App\Nova;

use App\Models\ContentBlock as Model;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Nova\Fields\Field;
use Laravel\Nova\Fields\Hidden;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class ContentBlock extends Resource
{
    public static string $model = Model::class;

    public static $title = 'name';

    public static $search = [
        'name',
        'slug',
    ];

    protected static array $orderBy = ['name' => 'asc'];

    public static function indexQuery(NovaRequest $request, $query): Builder
    {
        return parent::indexQuery($request, $query)->whereNull('type');
    }

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

            Text::make(__('Name'), 'name')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            Slug::make(__('Slug'), 'slug')
                ->from('name')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            $this->fieldBody($request),

            Hidden::make(__('Type'), 'type')
                ->default(fn () => null),

        ];
    }

    protected function fieldBody(NovaRequest $request): Field
    {
        return Markdown::make(__('Body'), 'body')
            ->alwaysShow()
            ->rules('required')
            ->hideFromIndex()
            ->showOnPreview();
    }
}
