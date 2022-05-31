<?php

use App\Mail\AttendancePlaced;
use App\Models\EventRegistration;
use Illuminate\Support\Facades\Mail;

if (app()->runningInConsole() === false) {
    Route::get('wip', static fn () => view('wip'));

    Route::get('/dev/send-mail-attendance-placed', static function () {
        Mail::send(new AttendancePlaced(EventRegistration::find(17)));
    })->name('dev.send-mail-attendance-placed');
}
