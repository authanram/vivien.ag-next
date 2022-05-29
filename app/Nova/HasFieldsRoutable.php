<?php

namespace App\Nova;

use App\ClassFinder;
use App\ClassMethodsResolver;
use App\Contracts\RoutableController;
use App\Http\Controllers\Controller;
use Laravel\Nova\Fields\FormData;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;
use ReflectionException;

trait HasFieldsRoutable
{
    private static function fieldsRoutable(string $attributeController = 'controller', string $attributeAction = 'action'): array
    {
        return [
            Select::make(__('Controller'), $attributeController)
                ->options(self::optionsController())
                ->displayUsingLabels(),

            Select::make(__('Action'), $attributeAction)
                ->displayUsingLabels()
                ->hide()
                ->dependsOn($attributeController, static function (
                    Select $field,
                    NovaRequest $request,
                    FormData $formData
                ) use ($attributeController) {
                    $controller = $formData->get($attributeController);

                    is_null($controller) === false
                        ? $field->options(self::optionsAction($controller))->show()
                        : $field->options([])->hide();
                }),
        ];
    }

    private static function optionsController(): array
    {
        return ClassFinder::make('\\App\\Http\\Controllers')
            ->reject(Controller::class)
            ->resolve()
            ->filter(fn ($controller) => is_subclass_of($controller, RoutableController::class))
            ->merge(collect(config('project-routables.controllers')))
            ->mapWithKeys(fn ($controller) => [$controller => class_basename($controller)])
            ->sort()
            ->toArray();
    }

    /**
     * @throws ReflectionException
     */
    private static function optionsAction(string $controller): array
    {
        return method_exists($controller, 'resolveActions')
            ? $controller::resolveActions()
            : ClassMethodsResolver::resolve($controller)
                ->mapWithKeys(fn ($method) => [$method => $method])
                ->toArray();
    }
}
