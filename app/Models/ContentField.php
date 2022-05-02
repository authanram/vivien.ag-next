<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContentField extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'slug',
        'type',
    ];

    public function blocks(): BelongsToMany
    {
        return $this->belongsToMany(ContentBlock::class, 'content_block_fields');
    }
}
