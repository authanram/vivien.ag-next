<?php

namespace App\Models;

use App\Enums\EventLocation;
use App\Enums\Weekday;
use App\Traits\HasUuids;
use Database\Factories\EventFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mattiverse\Userstamps\Traits\Userstamps;

class Event extends Model
{
    /** @use HasFactory<EventFactory> */
    use HasFactory;

    use HasUuids;
    use SoftDeletes;
    use Userstamps;

    protected $casts = [
        'date_from' => 'datetime',
        'date_to' => 'datetime',
        'event_location' => EventLocation::class,
        'event_day' => Weekday::class,
        'catering' => 'array',
    ];

    final public function displayName(): Attribute
    {
        return Attribute::get(fn () => $this->event_day
            ? "{$this->eventType->name}, {$this->event_day->label()}"
            : $this->eventType->name);
    }

    final public function availableSeats(): Attribute
    {
        return Attribute::get(function () {
            $booked = $this->attendees_sum_attendance ?? $this->attendees()->sum('attendance');

            return max(0, $this->maximum_attendees - ($this->reserved_seats ?? 0) - (int) $booked);
        });
    }

    public function scopePublished(Builder $query): void
    {
        $query->where('published', true);
    }

    public function scopeUpcoming(Builder $query): void
    {
        $query->where('date_from', '>=', now());
    }

    final public function eventType(): BelongsTo
    {
        return $this->belongsTo(EventType::class);
    }

    final public function attendees(): HasMany
    {
        return $this->hasMany(EventAttendee::class);
    }
}
