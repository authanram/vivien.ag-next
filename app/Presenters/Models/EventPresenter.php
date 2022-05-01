<?php

namespace App\Presenters\Models;

use App\Presenters\Presenter;

class EventPresenter extends Presenter
{
    public function dateFrom(): string
    {
        return $this->entity->date_from_readable;
    }

    public function dateTo(): string
    {
        return $this->entity->date_to_readable;
    }
}
