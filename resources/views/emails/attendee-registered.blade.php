<x-mail::message>
# Anmeldebestätigung

Liebe/r {{ $attendee->salutation->label() }} {{ $attendee->firstname }} {{ $attendee->surname }},

herzlichen Glückwunsch! Ihre Anmeldung für das folgende Seminar wurde erfolgreich entgegengenommen:

<x-mail::panel>
**{{ $event->eventType->name }}**

Datum: {{ $event->date_from->format('d.m.Y') }}
@if($event->date_from->format('d.m.Y') !== $event->date_to->format('d.m.Y'))
bis {{ $event->date_to->format('d.m.Y') }}
@endif
Uhrzeit: {{ $event->date_from->format('H:i') }} – {{ $event->date_to->format('H:i') }} Uhr

@if($event->event_location?->value === 'jaegerstrasse')
Ort: Jägerstraße 26, 75339 Spielberg
@elseif($event->custom_event_location)
Ort: {{ $event->custom_event_location }}
@else
Ort: {{ $event->event_location?->label() }}
@endif

Anzahl Personen: {{ $attendee->attendance }}
@if($event->price)
Preis: {{ number_format($event->price / 100, 2, ',', '.') }} €{{ $event->price_note ? ' (' . $event->price_note . ')' : '' }}
@endif
</x-mail::panel>

Bei Fragen stehe ich Ihnen gerne zur Verfügung.

Mit freundlichen Grüßen,<br>
**Sybille Seuffer**

Jägerstraße 26 · 75339 Spielberg<br>
[me@vivien.ag](mailto:me@vivien.ag)
</x-mail::message>
