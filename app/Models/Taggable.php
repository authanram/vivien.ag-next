<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Taggable
 *
 * @property int $tag_id
 * @property string $taggable_type
 * @property int $taggable_id
 * @property-read array $translations
 * @property-read \App\Models\Tag $tag
 * @method static Builder|Tag containing($name, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Taggable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Taggable newQuery()
 * @method static Builder|Tag ordered($direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Taggable query()
 * @method static \Illuminate\Database\Eloquent\Builder|Taggable whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Taggable whereTaggableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Taggable whereTaggableType($value)
 * @method static Builder|Tag withType($type = null)
 * @mixin \Eloquent
 */
class Taggable extends \Spatie\Tags\Tag
{
    protected $table = 'taggables';

    public $fillable = [
        'tag_id',
        'taggable_type',
        'taggable_id',
    ];

    final public function tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }
}
