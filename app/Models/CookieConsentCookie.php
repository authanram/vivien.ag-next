<?php

namespace App\Models;

use Database\Factories\CookieConsentCookieFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CookieConsentCookie extends Model
{
    /** @use HasFactory<CookieConsentCookieFactory> */
    use HasFactory;

    protected $casts = [
        'cookie_lifetime' => 'integer',
        'encrypted' => 'boolean',
        'required' => 'boolean',
    ];

    final public function cookieConsentProvider(): BelongsTo
    {
        return $this->belongsTo(CookieConsentProvider::class);
    }
}
