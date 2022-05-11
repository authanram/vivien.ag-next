<?php

namespace App\Nova;

//use Laravel\Nova\Fields\Code;
use App\Models\StaticAttribute as Model;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest as Request;

class StaticAttribute extends Resource
{
    public static string $model = Model::class;

    public static $title = 'name';

    public static $search = [
        'name',
        'slug',
        'value',
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
            ID::make()->sortable()->showOnPreview(),

            Text::make(__('Name'), 'name')
                ->creationRules('required', "unique:$table,name")
                ->updateRules('required', "unique:$table,name,{{resourceId}}")
                ->sortable()
                ->showOnPreview(),

            Slug::make(__('Slug'), 'slug')
                ->from('title')
                ->creationRules('required', "unique:$table,slug")
                ->updateRules('required', "unique:$table,slug,{{resourceId}}")
                ->sortable()
                ->showOnPreview(),

            Select::make(__('Type'), 'type')->options([
                0 => 'Simple (Text)',
                1 => 'Complex (JSON)',
            ])->displayUsingLabels()
                ->sortable()
                ->showOnPreview(),

//            Text::make(__('Value'), 'value')
//                ->sortable(),
//
//            Code::make(__('Value'), 'data')
//                ->json()
//                ->height('auto')
//                ->rules('json')
//                ->hideFromIndex(),
        ];
    }
}
