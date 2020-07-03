<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ContactController extends Controller
{
    final public function index(int $routeId): View
    {
        return view('contact', $this->defaultData($routeId));
    }
}
