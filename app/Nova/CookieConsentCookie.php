<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;

class CookieConsentCookie extends Resource
{
    public static $group = 'Cookie Consent';

    public static string $model = \App\Models\CookieConsentCookie::class;

    public static $title = 'cookie_name';

    public static $search = [
        'id',
        'cookie_name',
        'cookie_purpose',
        'cookie_type',
    ];

    final public function fields(Request $request): array
    {
        return [
            ID::make(__('Id'), 'id')
                ->onlyOnDetail()
            ,
            Text::make(__('Cookie Name'), 'cookie_name')
                ->rules('required')
                ->creationRules('unique:cookie_consent_cookies,cookie_name')
                ->updateRules('unique:cookie_consent_cookies,cookie_name,{{resourceId}}')
                ->help('Must be unique.')
                ->sortable()
            ,
            BelongsTo::make(__('Cookie Provider'), 'cookieProvider', CookieConsentProvider::class)
                ->required()
                ->showCreateRelationButton()
            ,
            Code::make(__('Cookie Purpose'), 'cookie_purpose')
                ->required()
                ->height('auto')
                ->hideFromIndex()
            ,
            Text::make(__('Cookie Category'), 'cookie_category')
                ->required()
            ,
            Text::make(__('Cookie Type'), 'cookie_type')
                ->required()
            ,
            Number::make(__('Cookie Lifetime'), 'cookie_lifetime')
                ->required()
                ->help('In days.')
            ,
            Boolean::make(__('Encrypted'), 'encrypted')
                ->sortable()
            ,
            Boolean::make(__('Required'), 'required')
                ->sortable()
            ,
        ];
    }

    final public static function label(): string
    {
        return __('Cookies');
    }
}
