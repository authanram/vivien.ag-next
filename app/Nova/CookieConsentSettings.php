<?php

namespace App\Nova;

use Laravel\Nova\Http\Requests\NovaRequest as Request;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\ID;

class CookieConsentSettings extends Resource
{
    public static string $model = \App\Models\CookieConsentSettings::class;

    public static $title = 'session_id';

    public static $search = [
        'id',
        'cookie_data',
        'session_data',
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make(__('Id'), 'id')
                ->exceptOnForms()
                ->sortable()
            ,
            Code::make(__('Cookie Data'), 'cookie_data')
                ->default('{}')
                ->json()
                ->height('auto')
            ,
            Code::make(__('Session Data'), 'session_data')
                ->default('{}')
                ->json()
                ->height('auto')
            ,
        ];
    }

    public static function label(): string
    {
        return __('Consents');
    }

    public static function singularLabel(): string
    {
        return __('Consent');
    }
}
