<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContentLayout extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'view_alias',
    ];

    public function contentLayoutSections(): HasMany
    {
        return $this->hasMany(ContentLayoutSection::class);
    }
}
