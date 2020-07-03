<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PortraitController extends Controller
{
    final public function index(int $routeId): View
    {
        return view('portrait', $this->defaultData($routeId));
    }
}
