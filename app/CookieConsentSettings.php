<?php

namespace App;

/**
 * App\CookieConsentSettings
 *
 * @property string $id
 * @property mixed $cookie_data
 * @property mixed $session_data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CookieConsentSettings newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CookieConsentSettings newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CookieConsentSettings query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CookieConsentSettings whereCookieData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CookieConsentSettings whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CookieConsentSettings whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CookieConsentSettings whereSessionData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CookieConsentSettings whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read string $entity_type
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
