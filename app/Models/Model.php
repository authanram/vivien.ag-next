<?php

namespace App\Models;

use Illuminate\Support\Str;

/**
 * App\Models\Model
 *
 * @property-read string $entity_type
 * @method static \Illuminate\Database\Eloquent\Builder|Model newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Model newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Model query()
 * @mixin \Eloquent
 */
class Model extends \Illuminate\Database\Eloquent\Model
{
    public static function getTagClassName(): string
    {
        return static::class;
    }

    final public function getEntityTypeAttribute(): string
    {
        return Str::studly($this->table);
    }
}
