<?php

namespace App\Nova;

use App\Models\Controller as Model;
use Exception;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphOne;
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
}
