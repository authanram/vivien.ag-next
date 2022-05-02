<?php

namespace App\Models;

use App\Presenters\Models\StaffProfilePresenter as Presenter;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property Presenter $presenter
 * @method Presenter present()
 */
class StaffProfile extends Model
{
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
