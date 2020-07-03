<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class GalleryController extends Controller
{
    final public function index(int $routeId): View
    {
        return view('gallery', $this->defaultData($routeId));
    }
}
