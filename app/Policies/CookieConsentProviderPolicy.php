<?php

namespace App\Policies;

use App\Models\CookieConsentProvider;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CookieConsentProviderPolicy
{
    use HandlesAuthorization;

    final public function viewAny(User $user): bool
    {
        return $user->isAdministrator();
    }

    final public function view(User $user, CookieConsentProvider $model): bool
    {
        return $user->isAdministrator();
    }

    final public function create(User $user): bool
    {
        return $user->isAdministrator();
    }

    final public function update(User $user, CookieConsentProvider $model): bool
    {
        return $user->isAdministrator();
    }

    final public function delete(User $user, CookieConsentProvider $model): bool
    {
        return $user->isAdministrator();
    }

    final public function restore(User $user, CookieConsentProvider $model): bool
    {
        return $user->isAdministrator();
    }

    final public function forceDelete(User $user, CookieConsentProvider $model): bool
    {
        return $user->isAdministrator();
    }
}
