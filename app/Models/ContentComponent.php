<?php

namespace App\Models;

use App\Presenters\Models\ContentComponentPresenter as Presenter;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContentComponent extends Model
{
    use SoftDeletes;

    public static string $presenter = Presenter::class;

    protected $fillable = [
        'name',
        'model',
        'columns',
        'view',
    ];
}
