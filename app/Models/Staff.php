<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'occupation',
        'image_url',
    ];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
