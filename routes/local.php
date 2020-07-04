<?php

use Illuminate\Support\Facades\Mail;

if (!app()->runningInConsole() && app()->environment('local')) {

    Route::get('wip', fn () => view('wip'));

    Route::get('/dev/send-mail-attendance-placed', static function () {

        Mail::send(new \App\Mail\AttendancePlaced(\App\Attendee::find(17)));

    })->name('dev.send-mail-attendance-placed');

}
