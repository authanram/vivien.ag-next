<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventCatering extends Model
{
    use Concerns\HasUuid;
    use SoftDeletes;

    protected $table = 'event_caterings';

    protected $fillable = [
        'uuid',
        'name',
    ];

    final public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
