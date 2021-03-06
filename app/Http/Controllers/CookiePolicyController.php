<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CookiePolicyController extends Controller
{
    final public function index(int $routeId): View
    {
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return view('cookie-policy', $this->defaultData($routeId));
    }
}
