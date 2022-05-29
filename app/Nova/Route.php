<?php

namespace App\Nova;

use App\Models\Route as Model;
use Exception;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\BooleanGroup;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Line;
use Laravel\Nova\Fields\MorphTo;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Http\Requests\NovaRequest as Request;

class Route extends Resource
{
    use HasFieldsRoutable;

    public static string $model = Model::class;

    public static $title = 'name';

    protected static array $orderBy = [
        'uri' => 'asc',
    ];

    public static $search = [
        'method',
        'name',
        'uri',
        'middlewares',
    ];

    public static $with = [
        'routable',
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

            Text::make(__('URI'), 'uri')
                ->sortable()
                ->exceptOnForms()
                ->showOnPreview(),

            Text::make(__('Name'), 'name')
                ->creationRules('required', 'unique:routes,name')
                ->updateRules('required', 'unique:routes,name,{{resourceId}}')
                ->sortable()
                ->showOnPreview(),

            Slug::make(__('URI'), 'uri')
                ->from('name')
                ->creationRules('required', $this->validationRuleUri($request))
                ->updateRules('required', $this->validationRuleUri($request))
                ->onlyOnForms(),

            MorphTo::make(__('Routable'), 'routable')
                ->types(config('project-routables.routables'))
                ->showCreateRelationButton()
                ->withoutTrashed()
                ->showOnPreview(),

            BooleanGroup::make(__('Middlewares'), 'middlewares')
                ->options(config('project-routables.middlewares'))
                ->hideFromIndex()
                ->showOnPreview(),

            Line::make(__('Middlewares'), 'middlewares')
                ->displayUsing(self::displayUsingMiddlewares($this->resource))
                ->extraClasses('text-sm'),

            Boolean::make(__('Published'), 'published')
                ->sortable()
                ->showOnPreview(),
        ];
    }

    private function validationRuleUri(NovaRequest $request): callable
    {
        return function($attribute, $value, $fail) use ($request) {
            $result = Model::where('uri', $value)
                ->where('method', $request->get('method'))
                ->first();

            if (is_null($result)
                || (
                    $request->isUpdateOrUpdateAttachedRequest()
                    && $this->resource->getAttribute('uri') === $value
                    && $this->resource->getAttribute('method') === $request->get('method')
                )
            ) {
                return null;
            }

            return $fail(__('validation.unique', ['attribute' => $attribute]));
        };
    }

    private static function displayUsingMiddlewares(Model $resource): callable
    {
        return static fn () => is_null($resource->middlewares) === false
            ? collect($resource->middlewares)
                ->filter(fn ($value, $key) => $value === true)
                ->keys()
                ->implode(', ')
            : '—';
    }
}
