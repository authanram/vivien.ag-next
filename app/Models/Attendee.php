<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * App\Models\Attendee
 *
 * @property int $id
 * @property int|null $event_id
 * @property string $uuid
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
 * @property-read \App\Models\Event|null $event
 * @property-read string $entity_type
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee newQuery()
 * @method static \Illuminate\Database\Query\Builder|Attendee onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee query()
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee whereAttendance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee whereSalutation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee whereUserAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendee whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|Attendee withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Attendee withoutTrashed()
 * @mixin \Eloquent
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
