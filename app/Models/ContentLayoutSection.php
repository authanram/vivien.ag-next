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

    public function contentPages(): BelongsToMany
    {
        return $this->belongsToMany(
            ContentPage::class,
            'content_page_layout_sections',
            'content_layout_section_id',
            'content_page_id',
        )->withPivot(['field', 'value']);
    }
}
