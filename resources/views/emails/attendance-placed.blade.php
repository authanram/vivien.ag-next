@component('mail::message', ['accent' => $accent])
<h1 style="color:{{ $accent }}">Du bist dabei! 🎉</h1>

<hr style="margin:24px 0;opacity:.3;">

<strong style="color:{{ $accent }}">Hallo {{ $attendee->firstname }},</strong>

anbei die Details zu deiner Anmeldung:

<strong>{{ $name }}</strong> ({{ $event->description }})
<br>{{ $dateFrom }} - @if($event->date_from->format('Y-d-m') !== $event->date_to->format('Y-d-m')){{ $dateTo }} Uhr @else {{ $event->date_to->format('H:i') }} Uhr @endif&nbsp;({{ $event->date_duration }})
<br>{{ $event->eventLocation->address }}

<strong>{{ $attendee->salutation === 0 ? 'Frau' : 'Herr' }} {{ $attendee->firstname }} {{ $attendee->surname }}</strong>
<br><strong>E-Mail</strong>: <a href="mailto:{{ $attendee->email }}">{{ $attendee->email }}</a>
@if($attendee->phone)<br><strong>Telefon</strong>: <a href="tel:{{ $attendee->phone }}">{{ $attendee->phone }}</a>@endif
<br><strong>Teilnehmer</strong>: {{ $attendee->attendance }} @if($event->price > 0)<small>({{ $attendee->attendance * $event->price }} EUR)</small>@endif
@if($attendee->message)<br><strong>Nachricht</strong>: {!! nl2br($attendee->message) !!}@endif

<br>

<strong style="color:{{ $accent }}">Ich freue mich auf dich!</strong>
<br>
Sybille Seuffer
@endcomponent
