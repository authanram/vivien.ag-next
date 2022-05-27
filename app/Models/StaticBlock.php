<?php

namespace App\Models;

use App\Presenters\StaticBlockPresenter as Presenter;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaticBlock extends Model
{
    use HasPresenter;
    use SoftDeletes;

    public static string $presenter = Presenter::class;

    protected $fillable = [
        'name',
        'slug',
        'value',
    ];
}
