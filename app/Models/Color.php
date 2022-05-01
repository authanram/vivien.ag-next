<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'color',
    ];

    public function eventTemplates(): HasMany
    {
        return $this->hasMany(EventTemplate::class);
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
