<?php

namespace App\Nova;

use App\Models\CookieConsentProvider as Model;
use Laravel\Nova\Fields\Line;
use Laravel\Nova\Fields\URL;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class CookieConsentProvider extends Resource
{
    public static string $model = Model::class;

    public static $title = 'name';

    public static $search = [
        'name',
        'url',
    ];

    public static $with = [
        'cookies:cookie_consent_provider_id',
    ];

    public static function label(): string
    {
        return __('Providers');
    }

    public static function singularLabel(): string
    {
        return __('Provider');
    }

    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()
                ->sortable()
                ->showOnPreview(),

            Text::make(__('Name'), 'name')
                ->creationRules('required', 'unique:cookie_consent_providers,name')
                ->updateRules('required', 'unique:cookie_consent_providers,name,{{resourceId}}')
                ->help('Must be unique.')
                ->sortable()
                ->showOnPreview(),

            URL::make(__('URL'), 'url')
                ->displayUsing(fn ($value) => $value)
                ->textAlign('left')
                ->rules('required')
                ->sortable()
                ->showOnPreview(),

            Line::make(__('Cookies'), fn () => $this->resource->cookies->count())
                ->extraClasses('text-sm'),

            HasMany::make(__('Cookies'), 'cookies', CookieConsentCookie::class),
        ];
    }
}
