<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ContactController extends Controller
{
    final public function index(int $routeId): View
    {
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return view('contact', $this->defaultData($routeId));
    }
}
