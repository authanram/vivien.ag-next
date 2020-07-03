<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ContentsController extends Controller
{
    final public function index(int $routeId): View
    {
        return view('contents', $this->defaultData($routeId));
    }
}
