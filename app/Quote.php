<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Quote
 *
 * @property int $id
 * @property string $uuid
 * @property string $body
 * @property int $author_id
 * @property int $published
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Author $author
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Quote onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Quote withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Quote withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote disableCache()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote withCacheCooldownSeconds($seconds = null)
 * @property-read string $entity_type
 */
class Quote extends Model
{
    use HasUuid;
    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'body',
        'author_id',
        'published',
    ];

    protected $with = ['author'];

    final public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}
