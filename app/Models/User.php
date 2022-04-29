<?php

namespace App\Models;

//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Nova\Auth\Impersonatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable //MustVerifyEmail
{
    use HasRoles;
    use Impersonatable;
    use Notifiable;

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

    public function isAdministrator(): bool
    {
        return $this->hasRole('administrator');
    }

    public function isModerator(): bool
    {
        return $this->hasRole('moderator');
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class);
    }
}
