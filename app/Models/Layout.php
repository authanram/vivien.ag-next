<?php

namespace App\Models;

use App\Presenters\LayoutPresenter as Presenter;

/**
 * @property Presenter $presenter
 * @method Presenter present()
 */
class Layout extends Model
{
    public static string $presenter = Presenter::class;

    protected $fillable = [
        'name',
        'view_alias',
        'sections',
    ];

    protected $casts = [
        'sections' => 'array',
    ];
}
