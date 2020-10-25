<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ContentsController extends Controller
{
    final public function index(int $routeId): View
    {
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return view('contents', $this->defaultData($routeId));
    }
}
