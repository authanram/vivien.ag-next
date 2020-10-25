<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\CookieConsentProvider
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CookieConsentCookie[] $cookies
 * @property-read int|null $cookies_count
 * @property-read string $entity_type
 * @method static \Illuminate\Database\Eloquent\Builder|CookieConsentProvider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CookieConsentProvider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CookieConsentProvider query()
 * @method static \Illuminate\Database\Eloquent\Builder|CookieConsentProvider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CookieConsentProvider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CookieConsentProvider whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CookieConsentProvider whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CookieConsentProvider whereUrl($value)
 * @mixin \Eloquent
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
