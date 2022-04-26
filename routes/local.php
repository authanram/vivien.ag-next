<?php

use Illuminate\Support\Facades\Mail;

if (app()->runningInConsole() === false) {
    Route::get('wip', static fn () => view('wip'));

    Route::get('/dev/send-mail-attendance-placed', static function () {
        Mail::send(new \App\Mail\AttendancePlaced(\App\Models\Attendee::find(17)));
    })->name('dev.send-mail-attendance-placed');
}
