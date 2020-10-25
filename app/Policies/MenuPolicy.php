<?php

namespace App\Policies;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MenuPolicy
{
    use HandlesAuthorization;

    final public function viewAny(User $user): bool
    {
        return $user->isAdministrator();
    }

    final public function view(User $user, Menu $model): bool
    {
        return $user->isAdministrator();
    }

    final public function create(User $user): bool
    {
        return $user->isAdministrator();
    }

    final public function update(User $user, Menu $model): bool
    {
        return $user->isAdministrator();
    }

    final public function delete(User $user, Menu $model): bool
    {
        return $user->isAdministrator();
    }

    final public function restore(User $user, Menu $model): bool
    {
        return $user->isAdministrator();
    }

    final public function forceDelete(User $user, Menu $model): bool
    {
        return $user->isAdministrator();
    }
}
