<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Layout extends Model
{
    protected $fillable = [
        'name',
        'view_alias',
        'sections',
    ];

    public function sections(): Attribute
    {
        return Attribute::make(
            get: static fn ($value) => json_decode($value, true, 512, JSON_THROW_ON_ERROR),
            set: static fn ($value) => json_encode(
                array_map(
                    static fn ($item) => trim($item),
                    explode(',', $value),
                ), JSON_THROW_ON_ERROR,
            ),
        );
    }

    public function pages(): HasMany
    {
        return $this->hasMany(Page::class);
    }
}
