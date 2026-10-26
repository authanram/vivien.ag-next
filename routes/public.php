<?php

use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\SeminarController;
use App\Http\Controllers\Public\StaticPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/seminare', [SeminarController::class, 'index'])->name('seminare.index');
Route::get('/seminare/{event:uuid}', [SeminarController::class, 'show'])->name('seminare.show');
Route::post('/seminare/{event:uuid}/anmelden', [SeminarController::class, 'register'])->name('seminare.register');

Route::get('/vortraege', [StaticPageController::class, 'vortraege'])->name('vortraege');
Route::get('/beratung', [StaticPageController::class, 'beratung'])->name('beratung');
Route::get('/lerntraining', [StaticPageController::class, 'lerntraining'])->name('lerntraining');
Route::get('/portrait', [StaticPageController::class, 'portrait'])->name('portrait');
Route::get('/kontakt', [StaticPageController::class, 'kontakt'])->name('kontakt');
Route::get('/impressum', [StaticPageController::class, 'impressum'])->name('impressum');
Route::get('/datenschutz', [StaticPageController::class, 'datenschutz'])->name('datenschutz');
Route::get('/cookie-vereinbarung', [StaticPageController::class, 'cookieVereinbarung'])->name('cookie-vereinbarung');
