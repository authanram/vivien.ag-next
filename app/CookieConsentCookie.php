<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\CookieConsentCookie
 *
 * @property int $id
 * @property string $cookie_name
 * @property int $cookie_consent_provider_id
 * @property string $cookie_purpose
 * @property string $cookie_category
 * @property string $cookie_type
 * @property int $cookie_lifetime
 * @property bool $encrypted
 * @property bool $required
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\CookieConsentProvider $cookieProvider
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CookieConsentCookie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CookieConsentCookie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CookieConsentCookie query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CookieConsentCookie whereCookieCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CookieConsentCookie whereCookieConsentProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CookieConsentCookie whereCookieLifetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CookieConsentCookie whereCookieName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CookieConsentCookie whereCookiePurpose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CookieConsentCookie whereCookieType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CookieConsentCookie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CookieConsentCookie whereEncrypted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CookieConsentCookie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CookieConsentCookie whereRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CookieConsentCookie whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read string $entity_type
 */
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

    final public function cookieProvider(): BelongsTo
    {
        return $this->belongsTo(CookieConsentProvider::class, 'cookie_consent_provider_id', 'id');
    }
}
