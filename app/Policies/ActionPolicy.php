<?php

namespace App\Policies;

use App\Activity;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActionPolicy
{
    use HandlesAuthorization;

    final public function viewAny(User $user): bool
    {
        return $user->isAdministrator() || $user->isModerator();
    }

    final public function view(User $user, Activity $model): bool
    {
        return $user->isAdministrator() || $user->isModerator();
    }

    final public function create(User $user): bool
    {
        return false;
    }

    final public function update(User $user, Activity $model): bool
    {
        return false;
    }

    final public function delete(User $user, Activity $model): bool
    {
        return false;
    }

    final public function restore(User $user, Activity $model): bool
    {
        return false;
    }

    final public function forceDelete(User $user, Activity $model): bool
    {
        return false;
    }
}
