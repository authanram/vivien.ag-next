<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    final public function viewAny(User $user): bool
    {
        return $user->isAdministrator() || $user->isModerator();
    }

    final public function view(User $user, User $model): bool
    {
        return $user->isAdministrator() || $user->isModerator();
    }

    final public function create(User $user): bool
    {
        return $user->isAdministrator() || $user->isModerator();
    }

    final public function update(User $user, User $model): bool
    {
        return $user->isAdministrator() || ($user->isModerator() && $user->is($model));
    }

    final public function delete(User $user, User $model): bool
    {
        return $user->isAdministrator();
    }

    final public function restore(User $user, User $model): bool
    {
        return $user->isAdministrator();
    }

    final public function forceDelete(User $user, User $model): bool
    {
        return $user->isAdministrator();
    }

    final public function uploadFiles(User $user): bool
    {
        return $user->isAdministrator() || $user->isModerator();
    }
}
