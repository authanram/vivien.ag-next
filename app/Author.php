<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Author
 *
 * @property int $id
 * @property string $uuid
 * @property string|null $name
 * @property string|null $occupation
 * @property string|null $url
 * @property int $published
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Quote[] $quotes
 * @property-read int|null $quotes_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Author newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Author newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Author onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Author query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Author whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Author whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Author whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Author whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Author whereOccupation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Author wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Author whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Author whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Author whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Author withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Author withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Author disableCache()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Author withCacheCooldownSeconds($seconds = null)
 * @property-read string $entity_type
 */
class Author extends Model
{
    use HasUuid;
    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'name',
        'occupation',
        'url',
        'published',
    ];

    final public function quotes(): HasMany
    {
        return $this->hasMany(Quote::class);
    }
}
