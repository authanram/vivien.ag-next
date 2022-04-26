<?php

namespace App\Models;

class CookieConsentSettings extends Model
{
    protected $table = 'cookie_consent_settings';

    protected $casts = [
        'id' => 'string',
    ];

    protected $fillable = [
        'id',
        'cookie_data',
        'session_data',
    ];
}
