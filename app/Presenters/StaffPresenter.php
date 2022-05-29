<?php

namespace App\Presenters;

use App\Models\Staff;

/**
 * @property Staff $entity
 */
class StaffPresenter extends Presenter
{
    public function disabledAt(): ?string
    {
        return $this->dateFormat('disabled_at');
    }
}
