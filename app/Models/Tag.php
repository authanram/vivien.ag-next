<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * App\Models\Tag
 *
 * @property int $id
 * @property array $name
 * @property array $slug
 * @property string|null $type
 * @property int $color_id
 * @property int|null $order_column
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Attachment[] $attachments
 * @property-read int|null $attachments_count
 * @property-read \App\Models\Color $color
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Event[] $events
 * @property-read int|null $events_count
 * @property-read array $translations
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Image[] $images
 * @property-read int|null $images_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $posts
 * @property-read int|null $posts_count
 * @method static Builder|Tag containing($name, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newQuery()
 * @method static Builder|Tag ordered($direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereColorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereUpdatedAt($value)
 * @method static Builder|Tag withType($type = null)
 * @mixin \Eloquent
 */
class Tag extends \Spatie\Tags\Tag
{
    public $fillable = [
        'name',
        'slug',
        'type',
        'order_column',
    ];

    public $casts = [
        'name' => 'array',
        'slug' => 'array',
    ];

    final public function setNameAttribute(string $value): void
    {
        $this->attributes['name'] = $value;
    }

    final public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    final public function attachments(): MorphToMany
    {
        return $this->morphedByMany(Attachment::class, 'taggable');
    }

    final public function events(): MorphToMany
    {
        return $this->morphedByMany(Event::class, 'taggable');
    }

    final public function images(): MorphToMany
    {
        return $this->morphedByMany(Image::class, 'taggable');
    }

    final public function posts(): MorphToMany
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }
}
