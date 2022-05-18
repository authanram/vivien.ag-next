<?php

namespace App\Models;

use App\Presenters\StaticAttributePresenter as Presenter;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property Presenter $presenter
 * @method Presenter present()
 */
class StaticAttribute extends Model
{
    use SoftDeletes;

    public static string $presenter = Presenter::class;

    protected $fillable = [
        'name',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];
}
