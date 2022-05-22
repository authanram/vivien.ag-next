<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Component extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'type',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function children(): BelongsToMany
    {
        return $this->belongsToMany(static::class, 'component_components', 'component_id', 'child_component_id');
    }
}
