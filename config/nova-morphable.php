<?php

use App\Nova\Page;
use App\Nova\Post;
use App\Nova\StaticBlock;
use Laravel\Nova\Fields\FormData;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;

return [

    'morphable' => [
        Post::class,
        StaticBlock::class,
    ],

    'targetable' => [
        Page::class,
    ],

    'fields' => static function (NovaRequest $request) {
        $sections = $request->findParentModel()
            ?->getAttribute('view')
            ?->getAttribute('sections') ?? [];

        if (count($sections) === 0) {
            return [];
        }

        $dependsOn = in_array($request->findParentModel()::class, config('nova-morphable.morphable'), true)
            ? 'targetable'
            : 'morphable';

        return [
            Select::make(__('Section'), 'section')
                ->options(array_combine($sections, $sections))
                ->displayUsingLabels()
                ->rules('required')
                ->hide()
                ->dependsOn($dependsOn, static function ($field, $request, FormData $formData) use ($dependsOn) {
                    is_null($formData->get($dependsOn))
                        ? $field->hide()
                        : $field->show();
                }),
        ];
    },

];
