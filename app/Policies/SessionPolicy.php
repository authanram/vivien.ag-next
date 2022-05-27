<?php

namespace App\Policies;

use App\Models\User;

class SessionPolicy extends Policy
{
    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, $model): bool
    {
        return false;
    }
}
