<?php

namespace App\Models;

use App\Presenters\ColorPresenter as Presenter;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $rgb
 */
class Color extends Model
{
    use HasPresenter;
    use SoftDeletes;

    public static string $presenter = Presenter::class;

    protected $fillable = [
        'color',
        'hex',
    ];

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

    public function userSettings(): HasMany
    {
        return $this->hasMany(UserSettings::class);
    }
}
