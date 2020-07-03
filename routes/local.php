<?php

if (!app()->runningInConsole() && app()->environment('local')) {

    Route::get('wip', fn () => view('wip'));

}
