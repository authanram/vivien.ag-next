<?php

namespace App\Http\Controllers\Api;

use App\Models\CookieConsentCookie;
use App\Models\CookieConsentSettings;
use App\Http\Requests\CookieConsentUpdatePreferencesRequest;
use Exception;
use Illuminate\Database\Eloquent\Collection;

final class CookieConsentController extends ApiController
{
    public function fetch(): Collection
    {
        $providerColumns = implode(',', self::getProviderColumns());

        return CookieConsentCookie::with("cookieProvider:$providerColumns")
            ->get(self::getCookieColumns());
    }

    public function updatePreferences(CookieConsentUpdatePreferencesRequest $request): bool
    {
        try {
            CookieConsentSettings::updateOrCreate([
                'id' => $request->session()->getId(),
            ], [
                'id' => $request->session()->getId(),
                'cookie_data' => json_encode($request->input('value'), JSON_THROW_ON_ERROR),
                'session_data' => json_encode($request->session()->all(), JSON_THROW_ON_ERROR),
            ]);
        } catch (Exception $exception) {
            report($exception);
            abort(500, $exception->getMessage());
        }

        return true;
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
