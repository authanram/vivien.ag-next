<?php

namespace App\Models;

use App\Presenters\StaticAttributePresenter as Presenter;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaticAttribute extends Model
{
    use HasPresenter;
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
