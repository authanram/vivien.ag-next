<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CookieConsentCookieResource extends JsonResource
{
    /** @return array<string, mixed> */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'cookie_name' => $this->cookie_name,
            'cookie_purpose' => $this->cookie_purpose,
            'cookie_category' => $this->cookie_category,
            'cookie_type' => $this->cookie_type,
            'cookie_lifetime' => $this->cookie_lifetime,
            'encrypted' => $this->encrypted,
            'required' => $this->required,
            'provider' => [
                'name' => $this->cookieConsentProvider->name,
                'url' => $this->cookieConsentProvider->url,
            ],
        ];
    }
}
