<?php

namespace App\Models;

use App\Presenters\LocationPresenter as Presenter;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use HasPresenter;
    use SoftDeletes;

    public static string $presenter = Presenter::class;

    protected $fillable = [
        'name',
        'description',
        'address',
        'url',
    ];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
