<?php

use App\Nova\Page;
use App\Nova\Post;
use App\Nova\StaticBlock;
use Authanram\NovaMorphable\Models\Morphable;
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

    'fields' => static function (NovaRequest $request, Morphable $resource) {
        $sections = $resource->load('targetable.layout')
            ?->getAttribute('targetable')
            ?->getAttribute('layout')
            ?->getAttribute('sections') ?? [];

        if (count($sections) === 0) {
            return [];
        }

        return [
            Select::make(__('Section'), 'section')
                ->options(array_combine($sections, $sections))
                ->displayUsingLabels()
                ->rules('required'),
        ];
    },

];
