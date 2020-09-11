<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * App\Attendee
 *
 * @property int $id
 * @property string $uuid
 * @property int $event_id
 * @property string $hash
 * @property int $salutation
 * @property string $firstname
 * @property string $surname
 * @property string $phone
 * @property string $email
 * @property int $attendance
 * @property string|null $message
 * @property string $ip_address
 * @property string $user_agent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Event $event
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendee newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Attendee onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendee query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendee whereAttendance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendee whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendee whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendee whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendee whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendee whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendee whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendee whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendee wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendee whereSalutation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendee whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendee whereUserAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendee whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Attendee withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Attendee withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendee disableCache()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attendee withCacheCooldownSeconds($seconds = null)
 * @property-read string $entity_type
 */
class Attendee extends Model
{
    use HasUuid;
    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'event_id',
        'hash',
        'salutation',
        'firstname',
        'surname',
        'phone',
        'email',
        'attendance',
        'message',
        'ip_address',
        'user_agent',
    ];

    protected $attributes = [
        'hash' => 'local',
        'ip_address' => '127.0.0.1',
        'user_agent' => 'local',
    ];

    final public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
