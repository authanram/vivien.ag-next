<?php

namespace App\Nova;

use App\Models\StaticAttribute as Model;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest as Request;

class StaticAttribute extends Resource
{
    public static string $model = Model::class;

    public static $title = 'name';

    public static $search = [
        'name',
        'data'
    ];

    protected static array $orderBy = ['name' => 'asc'];

    public static function label(): string
    {
        return __('Attributes');
    }

    public static function singularLabel(): string
    {
        return __('Attribute');
    }

    public function fields(Request $request): array
    {
        $table = $this->model()?->getTable();

        return [
            ID::make()
                ->sortable()
                ->showOnPreview(),

            Text::make(__('Name'), 'name')
                ->creationRules('required', "unique:$table,name")
                ->updateRules('required', "unique:$table,name,{{resourceId}}")
                ->sortable()
                ->showOnPreview(),

            Slug::make(__('Slug'), 'data.slug')
                ->from('name')
                ->sortable()
                ->showOnPreview(),

            Code::make(__('Value'), 'data.value')
                ->autoHeight()
                ->json()
                ->rules('json')
                ->onlyOnForms(),

            Text::make(__('Value'), fn () => data_get($this->resource, 'data.value'))
                ->exceptOnForms()
                ->sortable()
                ->showOnPreview(),
        ];
    }
}
