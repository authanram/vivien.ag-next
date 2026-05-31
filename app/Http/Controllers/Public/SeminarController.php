<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\Public\StoreAttendeeRequest;
use App\Http\Resources\EventResource;
use App\Mail\AttendeeRegisteredMail;
use App\Models\Event;
use App\Models\EventAttendee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;

class SeminarController extends Controller
{
    public function index(): Response
    {
        $events = Event::published()
            ->with('eventType')
            ->withSum('attendees', 'attendance')
            ->orderBy('date_from')
            ->get();

        return Inertia::render('public/Seminare', [
            'events' => EventResource::collection($events),
        ]);
    }

    public function show(Event $event): Response
    {
        abort_if(! $event->published, 404);

        $event->load('eventType')->loadSum('attendees', 'attendance');

        return Inertia::render('public/SeminareDetail', [
            'event' => new EventResource($event),
        ]);
    }

    public function register(StoreAttendeeRequest $request, Event $event): RedirectResponse
    {
        abort_if(! $event->published, 404);

        $attendee = EventAttendee::create([
            'uuid' => Str::uuid(),
            'event_id' => $event->id,
            'salutation' => $request->salutation,
            'firstname' => $request->firstname,
            'surname' => $request->surname,
            'phone' => $request->phone ?? '',
            'email' => $request->email,
            'attendance' => (int) $request->attendance,
            'message' => $request->message,
            'confirmed' => true,
        ]);

        Mail::to($attendee->email)->queue(new AttendeeRegisteredMail($attendee));

        if ($adminMail = config('mail.admin_address')) {
            Mail::to($adminMail)->queue(new AttendeeRegisteredMail($attendee));
        }

        return redirect()
            ->route('seminare.show', $event->uuid)
            ->with('success', __('Anmeldung erfolgreich! Wir freuen uns auf Sie.'));
    }
}
