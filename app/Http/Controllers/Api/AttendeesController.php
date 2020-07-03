<?php

namespace App\Http\Controllers\Api;

use App\Attendee;
use App\Event;
use App\Http\Requests\AttendeeCreateRequest;
use Illuminate\Support\Str;

class AttendeesController extends ApiController
{
    final public function create(AttendeeCreateRequest $request, Event $event): bool
    {
        try {
            $event->setAttribute(
                'reserved_seats',
                $event->getAttribute('reserved_seats') + $request->input('attendance')
            )->save();

            Attendee::create([
                'event_id' => $event->getAttribute('id'),
                'uuid' => Str::uuid()->toString(),
                'hash' => Str::uuid()->toString(),
                'salutation' => (int)$request->input('salutation'),
                'firstname' => $request->input('firstname'),
                'surname' => $request->input('surname'),
                'phone' => $request->input('phone') ?? '',
                'email' => $request->input('email'),
                'attendance' => (int)$request->input('attendance'),
                'message' => $request->input('message'),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            return true;

        } catch (\Exception $e) {

            return false;

        }
    }
}
