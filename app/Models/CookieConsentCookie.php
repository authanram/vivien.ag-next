<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CookieConsentCookie extends Model
{
    protected $table = 'cookie_consent_cookies';

    protected $fillable = [
        'cookie_name',
        'cookie_consent_provider_id',
        'cookie_purpose',
        'cookie_category',
        'cookie_type',
        'cookie_lifetime',
        'encrypted',
        'required',
    ];

    protected $casts = [
        'encrypted' => 'boolean',
        'required' => 'boolean',
    ];

    public function cookieProvider(): BelongsTo
    {
        return $this->belongsTo(CookieConsentProvider::class, 'cookie_consent_provider_id', 'id');
    }
}
