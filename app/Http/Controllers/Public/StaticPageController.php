<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Resources\CookieConsentCookieResource;
use App\Models\CookieConsentCookie;
use Inertia\Inertia;
use Inertia\Response;

class StaticPageController extends Controller
{
    public function vortraege(): Response
    {
        return Inertia::render('public/Vortraege');
    }

    public function beratung(): Response
    {
        return Inertia::render('public/Beratung');
    }

    public function lerntraining(): Response
    {
        return Inertia::render('public/Lerntraining');
    }

    public function portrait(): Response
    {
        return Inertia::render('public/Portrait');
    }

    public function kontakt(): Response
    {
        return Inertia::render('public/Kontakt');
    }

    public function impressum(): Response
    {
        return Inertia::render('public/Impressum');
    }

    public function datenschutz(): Response
    {
        return Inertia::render('public/Datenschutz');
    }

    public function cookieVereinbarung(): Response
    {
        return Inertia::render('public/CookieVereinbarung', [
            'cookies' => CookieConsentCookieResource::collection(
                CookieConsentCookie::query()
                    ->with('cookieConsentProvider')
                    ->orderBy('cookie_category')
                    ->orderBy('cookie_name')
                    ->get(),
            ),
        ]);
    }
}
