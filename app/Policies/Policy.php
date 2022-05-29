<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

abstract class Policy
{
    use HandlesAuthorization;

    public function before(User $user, $ability): ?bool
    {
        return true;
    }

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, $model): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, $model): bool
    {
        return true;
    }

    public function delete(User $user, $model): bool
    {
        return true;
    }

    public function forceDelete(User $user, $model): bool
    {
        return true;
    }

    public function restore(User $user, $model): bool
    {
        return true;
    }
}
