<?php

namespace App\Models;

//use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Presenters\UserPresenter as Presenter;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Nova\Auth\Impersonatable;
use Spatie\Permission\Traits\HasRoles;

/**
 * @method bool isAdministrator()
 * @method bool isModerator()
 */
class User extends Authenticatable //MustVerifyEmail
{
    use HasPresenter;
    use HasRoles;
    use Impersonatable;
    use Notifiable;

    public static string $presenter = Presenter::class;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class);
    }

    public function userSettings(): HasOne
    {
        return $this->hasOne(UserSettings::class);
    }
}
