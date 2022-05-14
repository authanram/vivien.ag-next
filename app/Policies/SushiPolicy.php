<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

abstract class SushiPolicy
{
    use HandlesAuthorization;

    public function novaBrowse(User $user): bool
    {
        return true;
    }

    public function view(User $user, $model): bool
    {
        return true;
    }
}
