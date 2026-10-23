<?php

namespace App\Models;

use Database\Factories\CookieConsentProviderFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CookieConsentProvider extends Model
{
    /** @use HasFactory<CookieConsentProviderFactory> */
    use HasFactory;

    final public function cookies(): HasMany
    {
        return $this->hasMany(CookieConsentCookie::class);
    }
}
