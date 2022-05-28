<?php

namespace App\Models;

use App\Presenters\PagePresenter as Presenter;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasPresenter;
    use SoftDeletes;

    public static string $presenter = Presenter::class;

    protected $fillable = [
        'name',
    ];

    public function view(): BelongsTo
    {
        return $this->belongsTo(View::class);
    }
}
