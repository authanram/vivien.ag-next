<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\StaticAttribute
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
 * @property-read string $entity_type
 * @method static \Illuminate\Database\Eloquent\Builder|StaticAttribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StaticAttribute newQuery()
 * @method static \Illuminate\Database\Query\Builder|StaticAttribute onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|StaticAttribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|StaticAttribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaticAttribute whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaticAttribute whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaticAttribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaticAttribute whereLocked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaticAttribute whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaticAttribute whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaticAttribute whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaticAttribute whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaticAttribute whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|StaticAttribute withTrashed()
 * @method static \Illuminate\Database\Query\Builder|StaticAttribute withoutTrashed()
 * @mixin \Eloquent
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
