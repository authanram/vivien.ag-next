<?php

namespace App\Nova;

use App\ClassFinder;
use App\Exceptions\PresenterException;
use App\Http\Controllers\ContentViewController;
use App\Http\Controllers\Controller;
use App\Models\ContentView;
use App\Models\Route as Model;
use App\RouteActionResolver;
use Exception;
use Illuminate\Support\Str;
use InvalidArgumentException;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Hidden;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Line;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Nova;
use Whitecube\NovaFlexibleContent\Flexible;

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
            'id' => ID::make()->showOnPreview(),

            'name' => Text::make(__('Name'), 'name')
                ->creationRules('required', 'unique:name,uri')
                ->updateRules('required', 'unique:routes,name,{{resourceId}}')
                ->sortable()
                ->showOnPreview(),

            'uri' => Slug::make(__('Uri'), 'uri')
                ->from('name')
                ->creationRules('required', 'unique:routes,uri')
                ->updateRules('required', 'unique:routes,uri,{{resourceId}}')
                ->sortable()
                ->showOnPreview(),

            'action' => self::indexFieldAction(),

            'published' => Boolean::make(__('Published'), 'published')
                ->sortable()
                ->showOnPreview(),
        ];
    }

    /**
     * @throws Exception
     */
    public function fieldsForCreate(Request $request): array
    {
        $fields = $this->fields($request);
        $contentViews = self::contentViews();
        $controllers = self::controllers();

        return [
            $fields['name'],

            $fields['uri'],

            Flexible::make(__('Action'), 'action')
                ->button('Add Action')
                ->confirmRemove()
                ->limit()
                ->addLayout(__('Controller').' ('.count($controllers).')', 'controller', [
                    Select::make(__('Value'), 'value')
                        ->options($controllers)
                        ->displayUsingLabels(),

                    Hidden::make(__('Subject'), 'subject', fn () => 'index'),
                ])
                ->addLayout(__('Content View').' ('.count($contentViews).')', ContentViewController::class, [
                    Hidden::make(__('Value'), 'value', fn () => ContentViewController::class),

                    Select::make(__('Value'), 'subject')
                        ->options($contentViews)
                        ->displayUsingLabels(),
                ]),

            $fields['published'],
        ];
    }

    /**
     * @throws Exception
     */
    public function fieldsForUpdate(Request $request): array
    {
        return $this->fieldsForCreate($request);
    }

    /**
     * @throws Exception
     */
    private static function indexFieldAction(): Text
    {
        return Line::make(__('Action'), static function (Model $model) {
            $routeActionResolver = self::resolveRouteAction($model);

            if (is_null($routeActionResolver)) {
                return null;
            }

            if ($routeActionResolver->isContentViewControllerAction() === false) {
                return $routeActionResolver->controller();
            }

            $url = Nova::path()
                .'/resources/'
                .\App\Nova\ContentView::uriKey()
                .'/'
                .$routeActionResolver->subject();

            return Str::of(\App\Nova\ContentView::class)
                ->append(': ')
                ->append('<strong>')
                ->append('<a href="'.$url.'" class="link-default">')
                ->append(ContentView::find($routeActionResolver->subject())->name)
                ->append('</a>')
                ->append('</strong>')
                ->toString();
        })->asHtml();
    }

    private static function controllers(): array
    {
        return ClassFinder::resolve(
            app_path('Http/Controllers'),
            'App\\Http\\Controllers\\',
            static fn ($subject) => is_subclass_of($subject, Controller::class)
                && $subject !== ContentViewController::class,
        )->mapWithKeys(fn ($classname) => [$classname => class_basename($classname)])
            ->toArray();
    }

    private static function contentViews(): array
    {
        return ContentView::all()
            ->pluck('name', 'id')
            ->toArray();
    }

    /**
     * @throws PresenterException
     */
    private static function resolveRouteAction(Model $model): ?RouteActionResolver
    {
        try {
            return $model->present()->resolveAction();
        } catch (InvalidArgumentException $exception) {
            return $exception->getMessage() !== 'Empty route action.'
                ? throw $exception
                : null;
        }
    }
}
