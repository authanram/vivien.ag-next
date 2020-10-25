<?php

namespace App\Policies;

use App\Models\ImageCoords;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImageCoordsPolicy
{
    use HandlesAuthorization;

    final public function viewAny(User $user): bool
    {
        return $user->isAdministrator();
    }

    final public function view(User $user, ImageCoords $model): bool
    {
        return $user->isAdministrator();
    }

    final public function create(User $user): bool
    {
        return $user->isAdministrator();
    }

    final public function update(User $user, ImageCoords $model): bool
    {
        return $user->isAdministrator();
    }

    final public function delete(User $user, ImageCoords $model): bool
    {
        return $user->isAdministrator();
    }

    final public function restore(User $user, ImageCoords $model): bool
    {
        return $user->isAdministrator();
    }

    final public function forceDelete(User $user, ImageCoords $model): bool
    {
        return $user->isAdministrator();
    }
}
