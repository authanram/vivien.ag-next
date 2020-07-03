<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Session
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property string $payload
 * @property int $last_activity
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Session newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Session newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Session query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Session whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Session whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Session whereLastActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Session wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Session whereUserAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Session whereUserId($value)
 * @mixin \Eloquent
 * @property-read string $entity_type
 */
class Session extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'ip_address',
        'user_agent',
        'payload',
        'last_activity',
    ];

    protected $with = ['user'];

    final public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
