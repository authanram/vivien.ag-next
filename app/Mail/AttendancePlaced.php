<?php

namespace App\Mail;

use App\Attendee;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AttendancePlaced extends Mailable
{
    use Queueable, SerializesModels;

    protected Attendee $attendee;

    public function __construct(Attendee $attendee)
    {
        $this->attendee = $attendee;
    }

    final public function build(): Mailable
    {
        $origin = 'onlinepost@vivien.ag';

        $attendee = $this->attendee;
        $event = $this->attendee->event;

        $name = $event->eventType->getAttribute('name');
        $dateFrom = $event->getAttribute('date_from')->format('d.m.Y, H:i');
        $dateTo = $event->getAttribute('date_to')->format('d.m.Y, H:i');

        return $this->to('authanram+vivienonlinepost@gmail.com')

            ->from($origin)

            ->replyTo($origin)

            ->subject("Du bist dabei! 🎉 ... $name ($dateFrom Uhr)")

            ->markdown('emails.attendance-placed')

            ->with(compact('name', 'dateFrom', 'dateTo', 'attendee', 'event'));
    }
}
