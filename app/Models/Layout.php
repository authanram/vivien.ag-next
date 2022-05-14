<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Layout extends Model
{
    protected $fillable = [
        'name',
        'view_alias',
        'sections',
    ];

    protected $casts = [
        'sections' => 'array',
    ];

    public function pages(): HasMany
    {
        return $this->hasMany(Page::class);
    }
}
