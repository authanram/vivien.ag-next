<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\ID;

class CookieConsentSettings extends Resource
{
    public static $group = 'Cookie Consent';

    public static $model = \App\CookieConsentSettings::class;

    public static $title = 'session_id';

    public static $search = [
        'id',
        'cookie_data',
        'session_data',
    ];

    final public function fields(Request $request): array
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

    final public static function label(): string
    {
        return 'Consents';
    }
}
