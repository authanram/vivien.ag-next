<?php

namespace App\Models;

use App\Presenters\UserSettingsPresenter as Presenter;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserSettings extends Model
{
    use HasPresenter;

    public static string $presenter = Presenter::class;

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
