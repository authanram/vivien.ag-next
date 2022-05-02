<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContentView extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'slug',
    ];

    protected $with = ['blocks'];

    public function blocks(): BelongsToMany
    {
        return $this->belongsToMany(ContentBlock::class, 'content_view_blocks');
    }
}
