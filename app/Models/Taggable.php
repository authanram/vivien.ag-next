<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Taggable extends \Spatie\Tags\Tag
{
    protected $table = 'taggables';

    public $fillable = [
        'tag_id',
        'taggable_type',
        'taggable_id',
    ];

    public function tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }
}
