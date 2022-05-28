<?php

namespace App\Models;

use App\Presenters\ViewPresenter as Presenter;
use Illuminate\Database\Eloquent\Relations\HasMany;

class View extends Model
{
    use HasPresenter;

    public static string $presenter = Presenter::class;

    protected $fillable = [
        'name',
        'view_alias',
        'sections',
    ];

    protected $casts = [
        'sections' => 'array',
    ];

    public function pages(): HasMany
    {
        return $this->hasMany(Page::class);
    }
}
