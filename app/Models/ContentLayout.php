<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContentLayout extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'slug',
        'value',
    ];

    public function blocks(): HasMany
    {
        return $this->hasMany(ContentBlock::class);
    }
}
