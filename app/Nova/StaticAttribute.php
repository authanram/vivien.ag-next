<?php

namespace App\Nova;

use Laravel\Nova\Fields\Slug;
//use Epartment\NovaDependencyContainer\HasDependencies;
//use Epartment\NovaDependencyContainer\NovaDependencyContainer;
use Laravel\Nova\Http\Requests\NovaRequest as Request;
//use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;

class StaticAttribute extends Resource
{
//    use HasDependencies;

    public static string $model = \App\Models\StaticAttribute::class;

    public static $title = 'name';

    public static $search = [
        'name',
        'slug',
        'value',
        'data'
    ];

    protected static array $orderBy = ['name' => 'asc'];

    public function fields(Request $request): array
    {
        $table = $this->model()?->getTable();

        return [
            ID::make()
                ->showOnPreview()
            ,
            Text::make(__('Name'), 'name')
                ->rules('required')
                ->creationRules("unique:$table,name")
                ->updateRules("unique:$table,name,{{resourceId}}")
                ->sortable()
                ->showOnPreview()
            ,
            Slug::make(__('Slug'), 'slug')
                ->from('title')
                ->creationRules('required', "unique:$table,slug")
                ->updateRules('required', "unique:$table,slug,{{resourceId}}")
                ->sortable()
                ->showOnPreview()
            ,
            Select::make(__('Type'), 'type')->options([
                0 => 'Simple (Text)',
                1 => 'Complex (JSON)',
            ])->displayUsingLabels()
                ->sortable()
                ->showOnPreview()
            ,
//            NovaDependencyContainer::make([
//                Text::make(__('Value'), 'value')
//                    ->sortable()
//                ,
//            ])->dependsOn('type', 0)
//            ,
//            NovaDependencyContainer::make([
//                Code::make(__('Value'), 'data')
//                    ->json()
//                    ->height('auto')
//                    ->rules('json')
//                    ->hideFromIndex()
//                ,
//            ])->dependsOn('type', 1)
//            ,
        ];
    }

    public static function label(): string
    {
        return __('Attributes');
    }

    public static function singularLabel(): string
    {
        return __('Attribute');
    }
}
