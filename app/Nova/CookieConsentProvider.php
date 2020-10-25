<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class CookieConsentProvider extends Resource
{
    public static $group = 'Cookie Consent';

    public static $model = \App\Models\CookieConsentProvider::class;

    public static $title = 'name';

    public static $search = [
        'id',
        'name',
        'url',
    ];

    final public function fields(Request $request): array
    {
        return [
            ID::make(__('Id'), 'id')
                ->onlyOnDetail()
            ,
            Text::make(__('Name'), 'name')
                ->rules('required')
                ->creationRules('unique:cookie_consent_providers,name')
                ->updateRules('unique:cookie_consent_providers,name,{{resourceId}}')
                ->help('Must be unique.')
                ->sortable()
            ,
            Text::make(__('Url'), 'url')
                ->rules('required', 'url')
            ,
            HasMany::make(__('Cookies'), 'cookies', CookieConsentCookie::class)
            ,
        ];
    }

    final public static function label(): string
    {
        return 'Providers';
    }
}
