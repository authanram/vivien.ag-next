@component('mail::message')
# Du bist dabei! 🎉

Wie bereits erwähnt, die Details zu deiner Anmeldung:

    {{ $name }} ({{ $event->description }})
    {{ $dateFrom }} - {{ $dateTo }}
    {{ $event->eventLocation->address }}
    {{ $attendee->attendance }} Teilnehmer @if($event->price > 0)({{ $attendee->attendance * $event->price }} EUR)@endif

__Ich freue mich auf dich!__
<br>
Sybille Seuffer
@endcomponent
