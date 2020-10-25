<?php

namespace App\Policies;

use App\Models\CookieConsentCookie;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CookieConsentCookiePolicy
{
    use HandlesAuthorization;

    final public function viewAny(User $user): bool
    {
        return $user->isAdministrator();
    }

    final public function view(User $user, CookieConsentCookie $model): bool
    {
        return $user->isAdministrator();
    }

    final public function create(User $user): bool
    {
        return $user->isAdministrator();
    }

    final public function update(User $user, CookieConsentCookie $model): bool
    {
        return $user->isAdministrator();
    }

    final public function delete(User $user, CookieConsentCookie $model): bool
    {
        return $user->isAdministrator();
    }

    final public function restore(User $user, CookieConsentCookie $model): bool
    {
        return $user->isAdministrator();
    }

    final public function forceDelete(User $user, CookieConsentCookie $model): bool
    {
        return $user->isAdministrator();
    }
}
