<?php

namespace App\Policies;

use App\Models\CookieConsentSettings;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CookieConsentSettingsPolicy
{
    use HandlesAuthorization;

    final public function viewAny(User $user): bool
    {
        return $user->isAdministrator();
    }

    final public function view(User $user, CookieConsentSettings $model): bool
    {
        return $user->isAdministrator();
    }

    final public function create(User $user): bool
    {
        return $user->isAdministrator();
    }

    final public function update(User $user, CookieConsentSettings $model): bool
    {
        return $user->isAdministrator();
    }

    final public function delete(User $user, CookieConsentSettings $model): bool
    {
        return $user->isAdministrator();
    }

    final public function restore(User $user, CookieConsentSettings $model): bool
    {
        return $user->isAdministrator();
    }

    final public function forceDelete(User $user, CookieConsentSettings $model): bool
    {
        return $user->isAdministrator();
    }
}
