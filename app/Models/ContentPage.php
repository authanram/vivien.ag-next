<?php

namespace App\Models;

use App\Presenters\Models\ContentPagePresenter as Presenter;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContentPage extends Model
{
    use SoftDeletes;

    public static string $presenter = Presenter::class;

    protected $fillable = [
        'name',
        'sections',
    ];

    protected $casts = [
        'sections' => 'array',
    ];

    protected static function booted(): void
    {
        static::saving(static function ($model) {
            foreach ($model->contentLayoutSections as $contentLayoutSection) {
                $model->contentLayoutSections()->updateExistingPivot(
                    $contentLayoutSection->id,
                    ['value' => $model->{$contentLayoutSection->name}],
                );

                unset($model->{$contentLayoutSection->name});
            }
        });
    }

    public function contentBlocks(): BelongsToMany
    {
        return $this->belongsToMany(
            ContentBlock::class,
            'content_page_blocks',
            'content_page_id',
            'content_block_id',
        )->withPivot(['section']);
    }

    public function contentLayoutSections(): BelongsToMany
    {
        return $this->belongsToMany(
            ContentLayoutSection::class,
            'content_page_layout_sections',
            'content_page_id',
            'content_layout_section_id',
        )->withPivot(['field', 'value']);
    }
}
