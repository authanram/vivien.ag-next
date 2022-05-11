<?php

namespace App\Nova;

use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;

class CookieConsentCookie extends Resource
{
    public static string $model = \App\Models\CookieConsentCookie::class;

    public static $title = 'cookie_name';

    public static $search = [
        'cookie_name',
        'cookie_purpose',
        'cookie_type',
    ];

    public static $with = ['cookieProvider'];

    public function fields(Request $request): array
    {
        return [
            ID::make(__('ID'), 'id')
                ->showOnPreview()
            ,
            Text::make(__('Cookie Name'), 'cookie_name')
                ->rules('required')
                ->creationRules('unique:cookie_consent_cookies,cookie_name')
                ->updateRules('unique:cookie_consent_cookies,cookie_name,{{resourceId}}')
                ->help('Must be unique.')
                ->sortable()
                ->showOnPreview()
            ,
            BelongsTo::make(__('Cookie Provider'), 'cookieProvider', CookieConsentProvider::class)
                ->rules('required')
                ->showCreateRelationButton()
            ,
            Code::make(__('Cookie Purpose'), 'cookie_purpose')
                ->rules('required')
                ->height('auto')
                ->hideFromIndex()
                ->showOnPreview()
            ,
            Text::make(__('Cookie Category'), 'cookie_category')
                ->rules('required')
                ->showOnPreview()
            ,
            Text::make(__('Cookie Type'), 'cookie_type')
                ->rules('required')
                ->showOnPreview()
            ,
            Number::make(__('Cookie Lifetime'), 'cookie_lifetime')
                ->rules('required')
                ->help('In days.')
                ->showOnPreview()
            ,
            Boolean::make(__('Encrypted'), 'encrypted')
                ->sortable()
                ->showOnPreview()
            ,
            Boolean::make(__('Required'), 'required')
                ->sortable()
                ->showOnPreview()
            ,
        ];
    }

    public static function label(): string
    {
        return __('Cookies');
    }
}
