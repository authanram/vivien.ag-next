<?php

namespace App\Presenters;

use App\Models\User;

/**
 * @property User $entity
 */
class UserPresenter extends Presenter
{
    public function isAdministrator(): bool
    {
        return $this->entity->hasRole('administrator');
    }

    public function isModerator(): bool
    {
        return $this->entity->hasRole('moderator');
    }
}
