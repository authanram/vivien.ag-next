<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventType extends Model
{
    use Concerns\HasUuid;
    use SoftDeletes;

    protected $table = 'event_types';

    protected $fillable = [
        'uuid',
        'color_id',
        'name',
        'description',
    ];

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
