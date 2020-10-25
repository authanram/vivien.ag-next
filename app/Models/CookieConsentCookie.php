<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\CookieConsentCookie
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
 * @property-read \App\Models\CookieConsentProvider $cookieProvider
 * @property-read string $entity_type
 * @method static \Illuminate\Database\Eloquent\Builder|CookieConsentCookie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CookieConsentCookie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CookieConsentCookie query()
 * @method static \Illuminate\Database\Eloquent\Builder|CookieConsentCookie whereCookieCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CookieConsentCookie whereCookieConsentProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CookieConsentCookie whereCookieLifetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CookieConsentCookie whereCookieName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CookieConsentCookie whereCookiePurpose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CookieConsentCookie whereCookieType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CookieConsentCookie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CookieConsentCookie whereEncrypted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CookieConsentCookie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CookieConsentCookie whereRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CookieConsentCookie whereUpdatedAt($value)
 * @mixin \Eloquent
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
