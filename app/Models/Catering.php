<?php

namespace App\Models;

use App\Presenters\CateringPresenter as Presenter;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Catering extends Model
{
    use HasPresenter;
    use SoftDeletes;

    public static string $presenter = Presenter::class;

    protected $fillable = [
        'name',
        'note',
        'is_selected',
    ];

    protected $casts = [
        'is_selected' => 'boolean',
    ];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
