<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Taggable
 *
 * @property int $tag_id
 * @property string $taggable_type
 * @property int $taggable_id
 * @property-read array $translations
 * @property-read \App\Tag $tag
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Tags\Tag containing($name, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Taggable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Taggable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Tags\Tag ordered($direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Taggable query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Taggable whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Taggable whereTaggableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Taggable whereTaggableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Tags\Tag withType($type = null)
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
