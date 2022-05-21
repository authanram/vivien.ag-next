<?php

use App\Actions\PageDetailAction;
use Illuminate\Support\Facades\Route;

Route::get('test/page/{slug?}', PageDetailAction::class);
