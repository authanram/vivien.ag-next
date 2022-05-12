<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContentLayoutSection extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function contentLayout(): BelongsTo
    {
        return $this->belongsTo(ContentLayout::class);
    }

    public function contentViews(): BelongsToMany
    {
        return $this->belongsToMany(
            ContentView::class,
            'content_view_layout_sections',
            'content_layout_section_id',
            'content_view_id',
        )->withPivot(['field', 'value']);
    }
}
