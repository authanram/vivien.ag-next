<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use Concerns\HasUuid;
    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'color',
    ];

    public function eventTypes(): HasMany
    {
        return $this->hasMany(EventType::class);
    }

    public function menuItems(): HasMany
    {
        return $this->hasMany(MenuItem::class);
    }

    public function tags(): HasMany
    {
        return $this->hasMany(Tag::class);
    }
}
