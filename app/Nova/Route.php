<?php

namespace App\Nova;

use App\Models\Route as Model;
use Exception;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
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

            Text::make(__('URI'), 'uri')
                ->sortable()
                ->exceptOnForms()
                ->showOnPreview(),

            Text::make(__('Name'), 'name')
                ->creationRules('required', 'unique:routes,name')
                ->updateRules('required', 'unique:routes,name,{{resourceId}}')
                ->sortable()
                ->showOnPreview(),

            Slug::make(__('Uri'), 'uri')
                ->from('name')
                ->creationRules('required', $this->validationRuleUri($request))
                ->updateRules('required', $this->validationRuleUri($request))
                ->onlyOnForms()
                ->showOnPreview(),

            Code::make(__('Middlewares'), 'middlewares', static fn ($value) => '["web"]')
                ->autoHeight()
                ->json()
                ->rules('required', 'json')
                ->hideFromIndex()
                ->showOnPreview(),

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
}
