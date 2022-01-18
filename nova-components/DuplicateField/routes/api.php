<?php

use Illuminate\Support\Facades\Route;
use Acme\DuplicateField\Http\Controllers\DuplicateController;

Route::post('/', DuplicateController::class . '@duplicate');
