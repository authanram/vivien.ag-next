<?php

namespace App\Models;

use App\Presenters\MenuPresenter as Presenter;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property Presenter $presenter
 * @method Presenter present()
 */
class Menu extends Model
{
    use SoftDeletes;

    public static string $presenter = Presenter::class;

    protected $fillable = [
        'slug',
        'published',
    ];

    public function menuItems(): HasMany
    {
        return $this->hasMany(MenuItem::class)->orderBy('order_column');
    }
}
