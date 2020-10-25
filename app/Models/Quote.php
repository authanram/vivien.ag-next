<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Quote
 *
 * @property int $id
 * @property string $uuid
 * @property string $body
 * @property int $author_id
 * @property int $published
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Author $author
 * @property-read string $entity_type
 * @method static \Illuminate\Database\Eloquent\Builder|Quote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Quote newQuery()
 * @method static \Illuminate\Database\Query\Builder|Quote onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Quote query()
 * @method static \Illuminate\Database\Eloquent\Builder|Quote whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quote whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quote whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quote wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quote whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|Quote withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Quote withoutTrashed()
 * @mixin \Eloquent
 */
class Quote extends Model
{
    use Concerns\HasUuid;
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
