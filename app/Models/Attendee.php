<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendee extends Model
{
    use Concerns\HasUuid;
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
