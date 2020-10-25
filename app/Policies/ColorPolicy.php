<?php

namespace App\Policies;

use App\Color;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ColorPolicy
{
    use HandlesAuthorization;

    final public function viewAny(User $user): bool
    {
        return $user->isAdministrator() || $user->isModerator();
    }

    final public function view(User $user, Color $model): bool
    {
        return $user->isAdministrator() || $user->isModerator();
    }

    final public function create(User $user): bool
    {
        return $user->isAdministrator();
    }

    final public function update(User $user, Color $model): bool
    {
        return $user->isAdministrator();
    }

    final public function delete(User $user, Color $model): bool
    {
        return $user->isAdministrator();
    }

    final public function restore(User $user, Color $model): bool
    {
        return $user->isAdministrator();
    }

    final public function forceDelete(User $user, Color $model): bool
    {
        return $user->isAdministrator();
    }
}
