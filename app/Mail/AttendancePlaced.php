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
        $sender = config('env.MAIL_SENDER_ADDRESS');

        $attendee = $this->attendee;

        $event = $this->attendee->event;

        $accent = '#' . collect(['d61f69', '047481', '9061f9', '057a55', '1c64f2', 'd03801'])->random(1)->first();

        $name = $event->eventType->getAttribute('name');

        $dateFrom = $event->getAttribute('date_from')->format('d.m.Y, H:i');

        $dateTo = $event->getAttribute('date_to')->format('d.m.Y, H:i');

        return $this->from($sender, config('env.MAIL_SENDER'))

            ->to($attendee->email, "$attendee->firstname $attendee->surname")

            ->bcc(config('env.MAIL_RECIPIENT'))

            ->bcc(config('env.MAIL_RECIPIENT_BCC'))

            ->replyTo($sender)

            ->subject("Du bist dabei! 🎉 ... $name ($dateFrom Uhr)")

            ->markdown('emails.attendance-placed')

            ->with(compact('accent', 'name', 'dateFrom', 'dateTo', 'attendee', 'event'));
    }
}
