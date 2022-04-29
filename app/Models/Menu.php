<?php

namespace App\Models;

use App\Models\Concerns\HasPresenter;
use App\Presenters\Models\MenuPresenter;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasPresenter;
    use SoftDeletes;

    protected string $presenter = MenuPresenter::class;

    protected $fillable = [
        'slug',
        'published',
    ];

    public function menuItems(): HasMany
    {
        return $this->hasMany(MenuItem::class)->orderBy('order_column');
    }
}
