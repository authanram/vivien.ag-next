<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventRegistration extends Model
{
    use Concerns\HasUuid;
    use SoftDeletes;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'event_id',
        'hash',
        'salutation',
        'firstname',
        'surname',
        'phone',
        'email',
        'seats',
        'message',
        'ip_address',
        'user_agent',
    ];

    protected $attributes = [
        'hash' => 'local',
        'ip_address' => '127.0.0.1',
        'user_agent' => 'local',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
