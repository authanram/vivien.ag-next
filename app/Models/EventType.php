<?php

namespace App\Models;

use App\Traits\HasUuids;
use Database\Factories\EventTypeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mattiverse\Userstamps\Traits\Userstamps;

class EventType extends Model
{
    /** @use HasFactory<EventTypeFactory> */
    use HasFactory;

    use HasUuids;
    use SoftDeletes;
    use Userstamps;

    final public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
