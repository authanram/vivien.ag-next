<?php

namespace App\Nova;

use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class CookieConsentProvider extends Resource
{
    public static string $model = \App\Models\CookieConsentProvider::class;

    public static $title = 'name';

    public static $search = [
        'name',
        'url',
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make(__('ID'), 'id')
                ->showOnPreview()
            ,
            Text::make(__('Name'), 'name')
                ->rules('required')
                ->creationRules('unique:cookie_consent_providers,name')
                ->updateRules('unique:cookie_consent_providers,name,{{resourceId}}')
                ->help('Must be unique.')
                ->sortable()
                ->showOnPreview()
            ,
            Text::make(__('Url'), 'url')
                ->rules('required', 'url')
                ->showOnPreview()
            ,
            HasMany::make(__('Cookies'), 'cookies', CookieConsentCookie::class)
            ,
        ];
    }

    public static function label(): string
    {
        return __('Providers');
    }

    public static function singularLabel(): string
    {
        return __('Provider');
    }
}
