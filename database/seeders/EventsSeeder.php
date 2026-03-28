<?php

namespace Database\Seeders;

use App\Enums\Catering;
use App\Enums\Color;
use App\Enums\EventLocation;
use App\Enums\Weekday;
use App\Models\Event;
use App\Models\EventAttendee;
use App\Models\EventType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seminarTypes = [
            [
                'name' => 'Paargruppe',
                'color' => Color::Rose->value,
                'description' => 'Ein geschützter Raum für Paare, die ihre Beziehung vertiefen und neue Wege der Kommunikation entdecken möchten.',
            ],
            [
                'name' => 'Frauengruppe',
                'color' => Color::Fuchsia->value,
                'description' => 'Austausch und Stärkung unter Frauen – Themen wie Selbstfürsorge, Grenzen setzen und innere Stärke.',
            ],
            [
                'name' => 'Frauengruppe 2',
                'color' => Color::Green->value,
                'description' => 'Austausch und Stärkung unter Frauen – Themen wie Selbstfürsorge, Grenzen setzen und innere Stärke.',
            ],
            [
                'name' => 'Schreibwerkstatt',
                'color' => Color::Sky->value,
                'description' => 'Kreatives Schreiben als Weg zu sich selbst. Mit Impulsen und Übungen eigene Texte entstehen lassen.',
            ],
            [
                'name' => 'Malwerkstatt',
                'color' => Color::Amber->value,
                'description' => 'Intuitives Malen ohne Vorkenntnisse. Farben und Formen als Ausdruck innerer Bilder und Gefühle.',
            ],
            [
                'name' => 'Schreibreise',
                'color' => Color::Emerald->value,
                'description' => 'Eine mehrtägige Reise, die Naturerlebnis und kreatives Schreiben miteinander verbindet.',
            ],
        ];

        $types = collect($seminarTypes)->map(fn (array $data) => EventType::create([
            'uuid' => Str::uuid(),
            ...$data,
        ]));

        $paargruppe = $types[0];
        $frauengruppe = $types[1];
        $schreibwerkstatt = $types[2];
        $malwerkstatt = $types[3];
        $schreibreise = $types[4];

        $seminars = [
            [
                'event_type_id' => $paargruppe->id,
                'event_day' => Weekday::Tuesday->value,
                'event_location' => EventLocation::Jaegerstrasse->value,
                'description' => 'Offener Abend für Paare – ankommen, zuhören, sich begegnen. Wir arbeiten mit Übungen aus der Paartherapie und schaffen Raum für ehrliche Gespräche.',
                'date_from' => Carbon::parse('2026-04-14 19:30'),
                'date_to' => Carbon::parse('2026-04-14 21:30'),
                'maximum_attendees' => 8,
                'reserved_seats' => 2,
                'price' => 2500,
                'price_note' => 'Pro Paar, inkl. Getränke',
                'catering' => [Catering::IncludingDrinks->value],
                'lead' => 'Sybille Seuffer',
                'published' => true,
            ],
            [
                'event_type_id' => $paargruppe->id,
                'event_day' => Weekday::Tuesday->value,
                'event_location' => EventLocation::Jaegerstrasse->value,
                'description' => 'Vertiefungsabend: Konflikte als Chance. Wie Paare durch Auseinandersetzung wachsen können.',
                'date_from' => Carbon::parse('2026-05-12 19:30'),
                'date_to' => Carbon::parse('2026-05-12 21:30'),
                'maximum_attendees' => 8,
                'reserved_seats' => 2,
                'price' => 2500,
                'price_note' => 'Pro Paar, inkl. Getränke',
                'catering' => [Catering::IncludingDrinks->value],
                'lead' => 'Sybille Seuffer',
                'published' => true,
            ],
            [
                'event_type_id' => $frauengruppe->id,
                'event_day' => Weekday::Thursday->value,
                'event_location' => EventLocation::Jaegerstrasse->value,
                'description' => 'Abendgruppe für Frauen, die sich Zeit für sich selbst nehmen möchten. Thema: Grenzen spüren und setzen.',
                'date_from' => Carbon::parse('2026-04-23 19:00'),
                'date_to' => Carbon::parse('2026-04-23 21:00'),
                'maximum_attendees' => 10,
                'price' => 1500,
                'catering' => [Catering::IncludingDrinks->value],
                'lead' => 'Sybille Seuffer',
                'published' => true,
            ],
            [
                'event_type_id' => $frauengruppe->id,
                'event_day' => Weekday::Thursday->value,
                'event_location' => EventLocation::Jaegerstrasse->value,
                'description' => 'Was nährt mich? Ein Abend über Selbstfürsorge und die kleinen Dinge, die uns Kraft geben.',
                'date_from' => Carbon::parse('2026-05-21 19:00'),
                'date_to' => Carbon::parse('2026-05-21 21:00'),
                'maximum_attendees' => 10,
                'price' => null,
                'catering' => [Catering::IncludingDrinks->value],
                'lead' => 'Sybille Seuffer',
                'published' => true,
            ],
            [
                'event_type_id' => $schreibwerkstatt->id,
                'event_day' => Weekday::Saturday->value,
                'event_location' => EventLocation::Jaegerstrasse->value,
                'description' => 'Ein Samstagnachmittag voller Schreibimpulse. Wir schreiben frei, lesen vor und lassen uns überraschen, was entsteht.',
                'date_from' => Carbon::parse('2026-04-18 14:00'),
                'date_to' => Carbon::parse('2026-04-18 18:00'),
                'maximum_attendees' => 12,
                'price' => 3500,
                'price_note' => 'Inkl. Material und Verpflegung',
                'catering' => [Catering::IncludingFood->value, Catering::IncludingDrinks->value],
                'lead' => 'Sybille Seuffer',
                'published' => true,
            ],
            [
                'event_type_id' => $schreibwerkstatt->id,
                'event_day' => Weekday::Saturday->value,
                'event_location' => EventLocation::Jaegerstrasse->value,
                'description' => 'Thema: Briefe, die nie geschrieben wurden. Ein kraftvoller Schreibimpuls für ungesagte Worte.',
                'date_from' => Carbon::parse('2026-06-13 14:00'),
                'date_to' => Carbon::parse('2026-06-13 18:00'),
                'maximum_attendees' => 12,
                'price' => 3500,
                'price_note' => 'Inkl. Material und Verpflegung',
                'catering' => [Catering::IncludingFood->value, Catering::IncludingDrinks->value],
                'lead' => 'Sybille Seuffer',
                'published' => true,
            ],
            [
                'event_type_id' => $malwerkstatt->id,
                'event_day' => Weekday::Sunday->value,
                'event_location' => EventLocation::Jaegerstrasse->value,
                'description' => 'Sonntagsatelier: Intuitives Malen mit Acryl auf großformatiger Leinwand. Keine Vorkenntnisse nötig.',
                'date_from' => Carbon::parse('2026-05-03 10:00'),
                'date_to' => Carbon::parse('2026-05-03 16:00'),
                'maximum_attendees' => 8,
                'price' => 4500,
                'price_note' => 'Inkl. Material, Leinwand und Mittagessen',
                'catering' => [Catering::IncludingFood->value, Catering::IncludingDrinks->value, Catering::RobysCatering->value],
                'lead' => 'Sybille Seuffer',
                'published' => true,
            ],
            [
                'event_type_id' => $malwerkstatt->id,
                'event_day' => Weekday::Sunday->value,
                'event_location' => EventLocation::Jaegerstrasse->value,
                'description' => 'Farben der Seele: Wir malen zu Musik und lassen innere Bilder sichtbar werden.',
                'date_from' => Carbon::parse('2026-07-05 10:00'),
                'date_to' => Carbon::parse('2026-07-05 16:00'),
                'maximum_attendees' => 8,
                'price' => 4500,
                'price_note' => 'Inkl. Material, Leinwand und Mittagessen',
                'catering' => [Catering::IncludingFood->value, Catering::IncludingDrinks->value, Catering::RobysCatering->value],
                'lead' => 'Sybille Seuffer',
                'published' => true,
            ],
            [
                'event_type_id' => $schreibreise->id,
                'event_day' => Weekday::Friday->value,
                'event_location' => EventLocation::Other->value,
                'custom_event_location' => 'Kloster Kirchberg, Kirchberg 1, 72172 Sulz am Neckar',
                'description' => 'Drei Tage Schreiben, Wandern und Stille im Kloster Kirchberg. Morgens Schreibimpulse, nachmittags Wanderungen durch den Schwarzwald, abends Lesung am Kamin.',
                'date_from' => Carbon::parse('2026-09-18 15:00'),
                'date_to' => Carbon::parse('2026-09-20 14:00'),
                'maximum_attendees' => 10,
                'reserved_seats' => 2,
                'price' => 4500,
                'price_note' => 'Inkl. Übernachtung, Vollpension und Material',
                'catering' => [Catering::IncludingFood->value, Catering::IncludingDrinks->value],
                'lead' => 'Sybille Seuffer',
                'published' => true,
            ],
            [
                'event_type_id' => $paargruppe->id,
                'event_day' => Weekday::Saturday->value,
                'event_location' => EventLocation::Other->value,
                'custom_event_location' => 'Kloster Kirchberg, Kirchberg 1, 72172 Sulz am Neckar',
                'description' => 'Paarwochenende: Zwei Tage intensiv als Paar – mit Gesprächen, Übungen und gemeinsamer Zeit in der Natur.',
                'date_from' => Carbon::parse('2026-10-10 10:00'),
                'date_to' => Carbon::parse('2026-10-11 16:00'),
                'maximum_attendees' => 6,
                'reserved_seats' => 1,
                'price' => 4000,
                'price_note' => 'Pro Paar, inkl. Übernachtung und Vollpension',
                'catering' => [Catering::IncludingFood->value, Catering::IncludingDrinks->value, Catering::RobysCatering->value],
                'lead' => 'Sybille Seuffer',
                'published' => false,
            ],
        ];

        foreach ($seminars as $seminar) {
            $event = Event::create([
                'uuid' => Str::uuid(),
                ...$seminar,
            ]);

            $attendeeCount = rand(0, $event->maximum_attendees);

            EventAttendee::factory()
                ->count($attendeeCount)
                ->create(['event_id' => $event->id]);
        }
    }
}
