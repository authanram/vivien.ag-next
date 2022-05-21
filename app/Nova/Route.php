<?php

namespace App\Nova;

use App\ClassFinder;
use App\ClassMethodsResolver;
use App\Contracts\Support\RoutableContract;
use App\Models\Route as Model;
use App\Routables\Routable;
use Exception;
use Illuminate\Support\Str;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\Hidden;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Http\Requests\NovaRequest as Request;
use ReflectionException;

class Route extends Resource
{
    public static string $model = Model::class;

    public static $title = 'name';

    public static $search = [
        'name',
        'uri',
    ];

    public static function label(): string
    {
        return __('Routes');
    }

    public static function singularLabel(): string
    {
        return __('Route');
    }

    /**
     * @throws Exception
     */
    public function fields(Request $request): array
    {
        return [
            ID::make()
                ->sortable()
                ->showOnPreview(),

            Select::make(__('Method'), 'method')
                ->options(['get' => 'GET', 'post' => 'POST'])
                ->displayUsingLabels()
                ->showOnPreview(),

            Text::make(__('Uri'), 'uri')
                ->sortable()
                ->exceptOnForms()
                ->showOnPreview(),

            Text::make(__('Name'), 'name')
                ->creationRules('required', 'unique:routes,uri')
                ->updateRules('required', 'unique:routes,uri,{{resourceId}}')
                ->sortable()
                ->showOnPreview(),

            Slug::make(__('Uri'), 'uri')
                ->from('name')
                ->creationRules('required', 'unique:routes,uri')
                ->updateRules('required', 'unique:routes,uri,{{resourceId}}')
                ->onlyOnForms()
                ->showOnPreview(),

            Code::make(__('Middlewares'), 'middlewares', static fn ($value) => '["web"]')
                ->autoHeight()
                ->json()
                ->rules('required', 'json')
                ->hideFromIndex()
                ->showOnPreview(),

            ...self::routableFields($request, $this->resource),

            Boolean::make(__('Published'), 'published')
                ->sortable()
                ->showOnPreview(),
        ];
    }

    private static function routableFields(NovaRequest $request, Model $resource): array
    {
        return [
            Select::make('Routable', 'routable')
                ->options(self::routableOptions($request, $resource))
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            Hidden::make('Action', 'action', static fn () => 'index'),

            Select::make('Action', 'action')
                ->hide()
                ->dependsOn('routable', static function (Select $field, $request, $formData) {
                    /** @var Routable|null $routable */
                    $routable = $formData->routable;

                    if (is_null($routable)) {
                        return;
                    }

                    /** @var RoutableContract $result */
                    $result = $routable::routable($field->value);

                    $field->withMeta([
                        'name' => $result->getName(),
                        'attribute' => $result->getAttribute(),
                        'value' => $result->getValue(),
                    ])->options($result->getOptions())->show();
                }),
        ];
    }

    private static function routableOptions(NovaRequest $request, Model $resource): array
    {
        return ClassFinder::resolve(app_path('Routables'), '\\App\\Routables\\')
            ->filter(static fn (string $classname) => self::routableFilter($classname))
            ->mapWithKeys(static fn (string $classname) => [$classname => self::routableName($classname)])
            ->toArray();
    }

    private static function routableFilter(string $classname): bool
    {
        return is_subclass_of($classname, Routable::class);
    }

    private static function routableName(string $classname): string
    {
        return Str::of($classname)->afterLast('\\')->before('Routable')->toString();
    }
}
