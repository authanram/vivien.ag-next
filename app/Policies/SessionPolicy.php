<?php

namespace App\Policies;

use App\Models\Session;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SessionPolicy
{
    use HandlesAuthorization;

    final public function viewAny(User $user): bool
    {
        return $user->isAdministrator();
    }

    final public function view(User $user, Session $model): bool
    {
        return $user->isAdministrator();
    }

    final public function create(User $user): bool
    {
        return false;
    }

    final public function update(User $user, Session $model): bool
    {
        return false;
    }

    final public function delete(User $user, Session $model): bool
    {
        return false;
    }
}
