<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy extends BasePolicy
{
    public function uploadFiles(User $user): bool
    {
        return $user->isAdministrator() || $user->isModerator();
    }
}
