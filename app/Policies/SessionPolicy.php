<?php

namespace App\Policies;

use App\Models\User;

class SessionPolicy extends BasePolicy
{
    protected static $authorizeBefore = [
        'delete',
        'novaBrowse',
        'view',
        'viewAny',
    ];

    final public function create(User $user): bool
    {
        return false;
    }

    final public function update(User $user, $model): bool
    {
        return false;
    }
}
