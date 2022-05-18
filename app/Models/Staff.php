<?php

namespace App\Models;

use App\Presenters\StaffPresenter as Presenter;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use HasPresenter;
    use SoftDeletes;

    public static string $presenter = Presenter::class;

    protected $fillable = [
        'name',
        'occupation',
        'image_url',
        'is_selected',
        'disabled_at',
    ];

    protected $casts = [
        'is_selected' => 'boolean',
    ];

    protected $dates = [
        'disabled_at',
    ];

    public function scopeNotDisabled(Builder $query): void
    {
        $query->whereNull('disabled_at');
    }

    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class, 'staff_events');
    }
}
