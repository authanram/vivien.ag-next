<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Catering extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'note',
    ];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
