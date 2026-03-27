<?php

use App\Filament\Resources\Events\Pages\CreateEvent;
use App\Models\EventType;
use App\Models\User;
use Livewire\Livewire;

it('sets event description from event type description', function () {
    $this->actingAs(User::factory()->create());

    $eventType = EventType::factory()->create([
        'description' => 'Seminar Beschreibung aus der Seminarart',
    ]);

    Livewire::test(CreateEvent::class)
        ->fillForm([
            'event_type_id' => $eventType->id,
        ])
        ->assertSchemaStateSet([
            'description' => 'Seminar Beschreibung aus der Seminarart',
        ]);
});
