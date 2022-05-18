<?php

namespace App\Models;

use App\Presenters\LayoutPresenter as Presenter;

class Layout extends Model
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
}
