<?php

namespace App\Mail;

use App\Models\EventAttendee;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AttendeeRegisteredMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(public readonly EventAttendee $attendee) {}

    public function envelope(): Envelope
    {
        $name = $this->attendee->event->eventType->name;
        $date = $this->attendee->event->date_from->format('d.m.Y');

        return new Envelope(
            subject: "Anmeldebestätigung: {$name} am {$date}",
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.attendee-registered',
            with: [
                'attendee' => $this->attendee,
                'event' => $this->attendee->event->load('eventType'),
            ],
        );
    }
}
