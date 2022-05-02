<?php

namespace App\Presenters\Models;

use App\Models\Event;
use App\Presenters\Presenter;

/**
 * @property Event $entity
 */
class EventPresenter extends Presenter
{
    public function dateFrom(): string
    {
        return $this->dateFormat('date_from');
    }

    public function dateTo(): string
    {
        return $this->dateFormat('date_to');
    }

    public function profitCurrent(): float
    {
        return $this->get('price')*$this->get('eventRegistrations')->count();
    }

    public function profitMaximum(): float
    {
        return $this->get('price')*$this->get('registrations_maximum');
    }

    public function profitPreview(): string
    {
        return $this->profitCurrent().' / '.$this->profitMaximum().' €';
    }

    public function registrationsCurrent(): string
    {
        return $this->get('eventRegistrations')->count().' / '.$this->get('registrations_maximum');
    }

    public function registrationsPreview(): string
    {
        $value = ($this->get('eventRegistrations')->count()*100)/$this->get('registrations_maximum');

        return ($value !== 0 ? number_format($value, 2).'%' : '');
    }
}
