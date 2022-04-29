<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quote extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'body',
        'author_id',
        'published',
    ];

    protected $with = ['author'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}
