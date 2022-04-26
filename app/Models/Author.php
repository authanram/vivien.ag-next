<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use Concerns\HasUuid;
    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'name',
        'occupation',
        'url',
        'published',
    ];

    final public function quotes(): HasMany
    {
        return $this->hasMany(Quote::class);
    }
}
