<?php

namespace App\Models;

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
        $template = '#%02x%02x%02x';

        return Attribute::make(
            get: static function ($value) use ($template) {
                return sprintf($template, ...explode(',', $value));
            },
            set: static function ($value) use ($template) {
                implode('', ([$r, $g, $b] = sscanf($value, $template)));
                return "$r,$g,$b";
            },
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
