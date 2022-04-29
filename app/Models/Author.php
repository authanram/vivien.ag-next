<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'occupation',
        'url',
        'published',
    ];

    public function quotes(): HasMany
    {
        return $this->hasMany(Quote::class);
    }
}
