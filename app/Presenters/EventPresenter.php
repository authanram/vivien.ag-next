<?php

namespace App\Presenters;

use App\Models\Event;
use Illuminate\Support\Str;

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

    public function duration(): string
    {
        $format = $this->get('date_from')
            ->diff($this->get('date_to'))
            ->format('%d d %h h %i i');

        return Str::of($format)
            ->remove(['0 d', '0 h', '0 i'])
            ->replace('1 d', '1 '.__('Day'))
            ->replace(['d', 'h', 'i'], [__('Days'), __('Hrs'), __('Min')])
            ->trim()
            ->toString();
    }

    public function profitCurrent(): float
    {
        return $this->get('price')*$this->get('eventRegistrations')->sum('seats');
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
        return $this->get('eventRegistrations')->sum('seats').' / '.$this->get('registrations_maximum');
    }

    public function registrationsPreview(): string
    {
        $value = ($this->get('eventRegistrations')->sum('seats')*100)/$this->get('registrations_maximum');

        return ($value !== 0 ? number_format($value, 2).'%' : '');
    }
}
