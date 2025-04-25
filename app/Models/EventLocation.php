<?php

namespace App\Models;

use App\Traits\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mattiverse\Userstamps\Traits\Userstamps;

class EventLocation extends Model
{
    /** @use HasFactory<\Database\Factories\EventLocationFactory> */
    use HasFactory;
    use HasUuids;
    use SoftDeletes;
    use Userstamps;

    protected $casts = [
        //
    ];

    final public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
