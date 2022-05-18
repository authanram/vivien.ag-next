<?php

namespace App\Nova;

use App\Models\Controller as Model;
use Exception;
use Laravel\Nova\Fields\Hidden;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphOne;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest as Request;

class Controller extends Resource
{
    public static string $model = Model::class;

    public static $title = 'name';

    public static $search = [
        'name',
    ];

    public static function label(): string
    {
        return __('Controllers');
    }

    public static function singularLabel(): string
    {
        return __('Controller');
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

            Text::make(__('Name'), 'name')
                ->sortable()
                ->showOnPreview(),

            MorphOne::make(__('Route'), 'route', Route::class)
                ->sortable()
                ->showOnPreview(),
        ];
    }

    public static function fieldsControllerAction(
        string $attribute,
        string $dependsOn,
    ): array {
        return [
            Hidden::make(__('Controller Action'), $attribute, static fn () => null),

            Select::make(__('Controller Action'), $attribute)
                ->displayUsingLabels()
                ->required()
                ->hide()
                ->hideFromIndex()
                ->dependsOn(
                    $dependsOn,
                    static function ($field, $request, $formData) {
                        $classname = Model::find($formData->routable)
                                ?->getAttributes()['name'] ?? null;

                        $actions = is_null($classname) === false
                            ? Model::controllerActions($classname)
                            : [];

                        $field->options(array_combine($actions, $actions));

                        return count($actions) > 1
                            ? $field->show()
                            : $field->required(false);
                    },
                ),
        ];
    }
}
