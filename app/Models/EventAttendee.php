<?php

namespace App\Models;

use App\Enums\Salutation;
use App\Traits\HasUuids;
use Database\Factories\EventAttendeeFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mattiverse\Userstamps\Traits\Userstamps;

class EventAttendee extends Model
{
    /** @use HasFactory<EventAttendeeFactory> */
    use HasFactory;

    use HasUuids;
    use SoftDeletes;
    use Userstamps;

    protected $casts = [
        'salutation' => Salutation::class,
        'confirmed' => 'boolean',
    ];

    final public function displayName(): Attribute
    {
        return Attribute::get(fn () => "{$this->salutation->label()} {$this->firstname} {$this->surname}");
    }

    final public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
