<?php

namespace App\Policies;

use App\Models\Route;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoutePolicy
{
    use HandlesAuthorization;

    final public function viewAny(User $user): bool
    {
        return $user->isAdministrator();
    }

    final public function view(User $user, Route $model): bool
    {
        return $user->isAdministrator();
    }

    final public function create(User $user): bool
    {
        return $user->isAdministrator();
    }

    final public function update(User $user, Route $model): bool
    {
        return $user->isAdministrator();
    }

    final public function delete(User $user, Route $model): bool
    {
        return $user->isAdministrator();
    }

    final public function restore(User $user, Route $model): bool
    {
        return $user->isAdministrator();
    }

    final public function forceDelete(User $user, Route $model): bool
    {
        return $user->isAdministrator();
    }
}
