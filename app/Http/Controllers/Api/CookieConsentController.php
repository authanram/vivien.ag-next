<?php

namespace App\Http\Controllers\Api;

use App\CookieConsentCookie;
use App\CookieConsentSettings;
use App\Http\Requests\CookieConsentUpdatePreferencesRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CookieConsentController extends ApiController
{
    final public function fetch(Request $request): Collection
    {
        return static::get();
    }

    public static function get(): Collection
    {
        $providerColumns = implode(',', static::getProviderColumns());

        return CookieConsentCookie::with("cookieProvider:$providerColumns")

            ->get(static::getCookieColumns());
    }

    final public function updatePreferences(CookieConsentUpdatePreferencesRequest $request): bool
    {
        try {

            CookieConsentSettings::updateOrCreate([

                'id' => $request->session()->getId(),

            ], [

                'id' => $request->session()->getId(),

                'cookie_data' => \json_encode($request->input('value'), JSON_THROW_ON_ERROR),

                'session_data' => \json_encode($request->session()->all(), JSON_THROW_ON_ERROR),

            ]);

            return true;

        } catch (\Exception $e) {

            abort(500, $e->getMessage());

        }
    }

    private static function getCookieColumns(): array
    {
        return [
            'id',
            'cookie_name',
            'cookie_consent_provider_id',
            'cookie_purpose',
            'cookie_category',
            'cookie_type',
            'cookie_lifetime',
            'encrypted',
            'required',
        ];
    }

    private static function getProviderColumns(): array
    {
        return [
            'id',
            'name',
            'url',
        ];
    }
}
