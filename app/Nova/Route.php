<?php

namespace App\Nova;

use App\ClassFinder;
use App\Contracts\Routable;
use App\Models\Route as Model;
use Exception;
use Illuminate\Support\Str;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphTo;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest as Request;

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

            MorphTo::make('Routable', 'routable')
                ->types(self::renderables())
                ->withoutTrashed()
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            ...Controller::fieldsControllerAction('meta->controller_action', 'routable'),

            Boolean::make(__('Published'), 'published')
                ->sortable()
                ->showOnPreview(),
        ];
    }

    public static function renderables(): array
    {
        return ClassFinder::resolve(app_path('Nova'), 'App\\Nova\\', static function (Resource|string $resource) {
            return property_exists($resource, 'model') && is_subclass_of($resource::$model, Routable::class);
        })->mapWithKeys(fn (string $classname) => [
            $classname => Str::of($classname)->afterLast('\\')->after('Content')->toString(),
        ])->toArray();
    }
}
