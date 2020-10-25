<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Author
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
 * @property-read string $entity_type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Quote[] $quotes
 * @property-read int|null $quotes_count
 * @method static \Illuminate\Database\Eloquent\Builder|Author newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Author newQuery()
 * @method static \Illuminate\Database\Query\Builder|Author onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Author query()
 * @method static \Illuminate\Database\Eloquent\Builder|Author whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Author whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Author whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Author whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Author whereOccupation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Author wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Author whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Author whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Author whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|Author withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Author withoutTrashed()
 * @mixin \Eloquent
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
