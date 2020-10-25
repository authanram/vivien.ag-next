<?php

namespace App\Policies;

use App\Models\MenuItem;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MenuItemPolicy
{
    use HandlesAuthorization;

    final public function viewAny(User $user): bool
    {
        return $user->isAdministrator();
    }

    final public function view(User $user, MenuItem $model): bool
    {
        return $user->isAdministrator();
    }

    final public function create(User $user): bool
    {
        return $user->isAdministrator();
    }

    final public function update(User $user, MenuItem $model): bool
    {
        return $user->isAdministrator();
    }

    final public function delete(User $user, MenuItem $model): bool
    {
        return $user->isAdministrator();
    }

    final public function restore(User $user, MenuItem $model): bool
    {
        return $user->isAdministrator();
    }

    final public function forceDelete(User $user, MenuItem $model): bool
    {
        return $user->isAdministrator();
    }
}
