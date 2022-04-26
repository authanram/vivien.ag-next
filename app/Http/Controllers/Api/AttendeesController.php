<?php

namespace App\Http\Controllers\Api;

use App\Mail\AttendancePlaced;
use App\Models\Attendee;
use App\Models\Event;
use App\Http\Requests\AttendeeCreateRequest;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

final class AttendeesController extends ApiController
{
    public function create(AttendeeCreateRequest $request, Event $event): bool
    {
        $event->setAttribute(
            'reserved_seats',
            $event->getAttribute('reserved_seats') + $request->input('attendance')
        )->save();

        try {
            $attendee = Attendee::create([
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
        } catch (Exception $exception) {
            report($exception);
            return false;
        }

        Mail::send(new AttendancePlaced($attendee));

        return true;
    }
}
