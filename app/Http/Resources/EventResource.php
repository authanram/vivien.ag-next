<?php

namespace App\Http\Resources;

use App\Enums\Catering;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /** @return array<string, mixed> */
    public function toArray(Request $request): array
    {
        $durationHours = $this->date_from && $this->date_to
            ? (int) round($this->date_from->diffInMinutes($this->date_to) / 60)
            : null;

        $durationDays = $this->date_from && $this->date_to
            ? $this->date_from->startOfDay()->diffInDays($this->date_to->startOfDay())
            : null;

        return [
            'uuid' => $this->uuid,
            'event_type' => new EventTypeResource($this->whenLoaded('eventType')),
            'event_location' => $this->event_location?->value,
            'event_location_label' => $this->event_location?->label(),
            'custom_event_location' => $this->custom_event_location,
            'event_day' => $this->event_day?->value,
            'event_day_label' => $this->event_day?->label(),
            'date_from' => $this->date_from?->toIso8601String(),
            'date_to' => $this->date_to?->toIso8601String(),
            'maximum_attendees' => $this->maximum_attendees,
            'reserved_seats' => $this->reserved_seats ?? 0,
            'available_seats' => $this->available_seats,
            'duration_hours' => $durationHours,
            'duration_days' => $durationDays,
            'is_multi_day' => $durationDays > 0,
            'price' => $this->price,
            'price_note' => $this->price_note,
            'catering' => collect($this->catering ?? [])->map(
                fn (string $c) => Catering::from($c)->label()
            )->values()->all(),
            'lead' => $this->lead,
            'description' => $this->description,
            'created_at' => $this->created_at?->toIso8601String(),
        ];
    }
}
