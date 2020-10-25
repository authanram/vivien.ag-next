<?php

namespace App\Models;

/**
 * App\Models\CookieConsentSettings
 *
 * @property string $id
 * @property mixed $cookie_data
 * @property mixed $session_data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $entity_type
 * @method static \Illuminate\Database\Eloquent\Builder|CookieConsentSettings newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CookieConsentSettings newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CookieConsentSettings query()
 * @method static \Illuminate\Database\Eloquent\Builder|CookieConsentSettings whereCookieData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CookieConsentSettings whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CookieConsentSettings whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CookieConsentSettings whereSessionData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CookieConsentSettings whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
