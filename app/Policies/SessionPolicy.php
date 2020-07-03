<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Session;

class SessionPolicy
{
    use HandlesAuthorization;

    public function viewAny(): bool
    {
        return true;
    }

    public function view(): bool
    {
        return true;
    }

    public function create(): bool
    {
        return false;
    }

    public function update(User $user, Session $attribute): bool
    {
        return false;
    }

    public function delete(User $user, Session $attribute): bool
    {
        return false;
    }
}
