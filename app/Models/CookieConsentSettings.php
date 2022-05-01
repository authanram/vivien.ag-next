<?php

namespace App\Models;

class CookieConsentSettings extends Model
{
    protected $casts = [
        'id' => 'string',
        'cookie_data' => 'array',
        'session_data' => 'array',
    ];

    protected $fillable = [
        'id',
        'cookie_data',
        'session_data',
    ];
}
