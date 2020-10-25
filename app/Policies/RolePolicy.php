<?php

namespace App\Policies;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    final public function viewAny(User $user): bool
    {
        return $user->isAdministrator();
    }

    final public function view(User $user, Role $model): bool
    {
        return $user->isAdministrator();
    }

    final public function create(User $user): bool
    {
        return $user->isAdministrator();
    }

    final public function update(User $user, Role $model): bool
    {
        return $user->isAdministrator();
    }

    final public function delete(User $user, Role $model): bool
    {
        return $user->isAdministrator();
    }

    final public function restore(User $user, Role $model): bool
    {
        return $user->isAdministrator();
    }

    final public function forceDelete(User $user, Role $model): bool
    {
        return $user->isAdministrator();
    }
}
