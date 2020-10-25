<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class BooksController extends Controller
{
    final public function index(int $routeId): View
    {
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return view('books', $this->defaultData($routeId));
    }
}
