<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventLocation extends Model
{
    use Concerns\HasUuid;
    use SoftDeletes;

    protected $table = 'event_locations';

    protected $fillable = [
        'name',
        'description',
        'address',
        'url',
    ];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
