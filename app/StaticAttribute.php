<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\StaticAttribute
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $type
 * @property string|null $value
 * @property array $data
 * @property int $locked
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StaticAttribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StaticAttribute newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\StaticAttribute onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StaticAttribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StaticAttribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StaticAttribute whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StaticAttribute whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StaticAttribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StaticAttribute whereLocked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StaticAttribute whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StaticAttribute whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StaticAttribute whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StaticAttribute whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StaticAttribute whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|\App\StaticAttribute withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\StaticAttribute withoutTrashed()
 * @mixin \Eloquent
 * @property-read string $entity_type
 */
class StaticAttribute extends Model
{
    protected $table = 'static_attributes';

    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'value',
        'data',
        'locked',
    ];

    protected $attributes = [
        'data' => '{}',
    ];

    protected $casts = [
        'data' => 'array',
    ];
}
