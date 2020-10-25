<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Spatie\Permission\Models\Permission;

class PermissionPolicy
{
    use HandlesAuthorization;

    final public function viewAny(User $user): bool
    {
        return $user->isAdministrator();
    }

    final public function view(User $user, Permission $model): bool
    {
        return $user->isAdministrator();
    }

    final public function create(User $user): bool
    {
        return $user->isAdministrator();
    }

    final public function update(User $user, Permission $model): bool
    {
        return $user->isAdministrator();
    }

    final public function delete(User $user, Permission $model): bool
    {
        return $user->isAdministrator();
    }

    final public function restore(User $user, Permission $model): bool
    {
        return $user->isAdministrator();
    }

    final public function forceDelete(User $user, Permission $model): bool
    {
        return $user->isAdministrator();
    }
}
