<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\CookieConsentProvider
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\CookieConsentCookie[] $cookies
 * @property-read int|null $cookies_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CookieConsentProvider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CookieConsentProvider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CookieConsentProvider query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CookieConsentProvider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CookieConsentProvider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CookieConsentProvider whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CookieConsentProvider whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CookieConsentProvider whereUrl($value)
 * @mixin \Eloquent
 * @property-read string $entity_type
 */
class CookieConsentProvider extends Model
{
    protected $table = 'cookie_consent_providers';

    protected $fillable = [
        'name',
        'url',
    ];

    final public function cookies(): HasMany
    {
        return $this->hasMany(CookieConsentCookie::class, 'cookie_consent_provider_id', 'id');
    }
}
