<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy extends Policy
{
    public function uploadFiles(User $user): bool
    {
        return $user->isAdministrator() || $user->isModerator();
    }
}
