<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class CookieConsentProvider extends Model
{
    protected $table = 'cookie_consent_providers';

    protected $fillable = [
        'name',
        'url',
    ];

    public function cookies(): HasMany
    {
        return $this->hasMany(CookieConsentCookie::class, 'cookie_consent_provider_id', 'id');
    }
}
