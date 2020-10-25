<?php

namespace App\Policies;

use App\Attachment;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AttachmentPolicy
{
    use HandlesAuthorization;

    final public function viewAny(User $user): bool
    {
        return $user->isAdministrator();
    }

    final public function view(User $user, Attachment $model): bool
    {
        return $user->isAdministrator();
    }

    final public function create(User $user): bool
    {
        return $user->isAdministrator();
    }

    final public function update(User $user, Attachment $model): bool
    {
        return $user->isAdministrator();
    }

    final public function delete(User $user, Attachment $model): bool
    {
        return $user->isAdministrator();
    }

    final public function restore(User $user, Attachment $model): bool
    {
        return $user->isAdministrator();
    }

    final public function forceDelete(User $user, Attachment $model): bool
    {
        return $user->isAdministrator();
    }
}
