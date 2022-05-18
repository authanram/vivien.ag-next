<?php

namespace App\Models;

use App\Colors;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'color',
        'rgb',
    ];

    public function rgb(): Attribute
    {
        return Attribute::make(
            get: static fn ($value) => Colors::rgbToHex($value),
            set: static fn ($value) => Colors::hexToRgb($value),
        );
    }

    public function eventTemplates(): HasMany
    {
        return $this->hasMany(EventTemplate::class);
    }

    public function menuItems(): HasMany
    {
        return $this->hasMany(MenuItem::class);
    }

    public function tags(): HasMany
    {
        return $this->hasMany(Tag::class);
    }
}
