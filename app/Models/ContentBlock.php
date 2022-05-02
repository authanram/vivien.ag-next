<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContentBlock extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'slug',
    ];

    protected $with = ['fields'];

    public function layout(): BelongsTo
    {
        return $this->belongsTo(ContentLayout::class, 'content_layout_id');
    }

    public function fields(): BelongsToMany
    {
        return $this->belongsToMany(ContentField::class, 'content_block_fields');
    }

    public function views(): BelongsToMany
    {
        return $this->belongsToMany(ContentView::class, 'content_view_blocks');
    }
}
