<?php

namespace App\Models;

use App\Presenters\Models\ContentViewPresenter as Presenter;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContentView extends Model
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

    protected static function booted()
    {
        static::saving(function ($model) {
            $attributes = [];

            foreach ($model->contentLayoutSections as $contentLayoutSection) {
                $attribute = $contentLayoutSection->pivot;

                $attribute->value = $model->{$contentLayoutSection->name};

                $attributes[] = $attribute->toArray();

                unset($model->{$contentLayoutSection->name});
            }

            $model->contentLayoutSections()->syncWithoutDetaching($attributes);
        });
    }

    public function contentBlocks(): BelongsToMany
    {
        return $this->belongsToMany(
            ContentBlock::class,
            'content_view_blocks',
            'content_view_id',
            'content_block_id',
        )->withPivot(['section']);
    }

    public function contentLayoutSections(): BelongsToMany
    {
        return $this->belongsToMany(
            ContentLayoutSection::class,
            'content_view_layout_sections',
            'content_view_id',
            'content_layout_section_id',
        )->withPivot(['field', 'value']);
    }
}
