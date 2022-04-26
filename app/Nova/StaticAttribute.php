<?php

namespace App\Nova;

use Drobee\NovaSluggable\Slug;
use Drobee\NovaSluggable\SluggableText;
use Epartment\NovaDependencyContainer\HasDependencies;
use Epartment\NovaDependencyContainer\NovaDependencyContainer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;

class StaticAttribute extends Resource
{
    use HasDependencies;

    protected static array $orderBy = ['name' => 'asc'];

    public static string $model = \App\Models\StaticAttribute::class;

    public static $title = 'name';

    public static $search = [
        'id',
        'name',
        'slug',
        'value',
        'data'
    ];

    public function fields(Request $request): array
    {
        $table = $this->model()?->getTable();

        return [
            ID::make()->hideFromIndex()
            ,
            SluggableText::make(__('Name'), 'name')
                ->rules('required')
                ->creationRules("unique:$table,name")
                ->updateRules("unique:$table,name,{{resourceId}}")
                ->sortable()
            ,
            Slug::make(__('Slug'), 'slug')
                ->withMeta(['readonly' => 'true'])
                ->creationRules("unique:$table,slug")
                ->updateRules("unique:$table,slug,{{resourceId}}")
                ->sortable()
            ,
            Select::make(__('Type'), 'type')->options([
                0 => 'Simple (Text)',
                1 => 'Complex (JSON)',
            ])->displayUsingLabels()
                ->sortable()
            ,
            NovaDependencyContainer::make([
                Text::make(__('Value'), 'value')
                    ->sortable()
                ,
            ])->dependsOn('type', 0)
            ,
            NovaDependencyContainer::make([
                Code::make(__('Value'), 'data')
                    ->json()
                    ->height('auto')
                    ->rules('json')
                    ->hideFromIndex()
                ,
            ])->dependsOn('type', 1)
            ,
            Boolean::make(__('Locked'), 'locked')
                ->sortable()
                ->trueValue('1')
                ->falseValue('0')
            ,
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
