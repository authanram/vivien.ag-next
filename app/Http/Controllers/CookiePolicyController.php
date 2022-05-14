<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

final class CookiePolicyController extends Controller
{
    public function index(): View
    {
        return view('cookie-policy');
    }
}
