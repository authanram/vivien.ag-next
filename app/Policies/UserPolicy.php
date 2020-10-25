<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy extends BasePolicy
{
    final public function uploadFiles(User $user): bool
    {
        return $user->isAdministrator() || $user->isModerator();
    }
}
