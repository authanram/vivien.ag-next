<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventTemplate extends Model
{
    use SoftDeletes;

    protected $fillable = [
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
