<?php

namespace App\Http\Controllers;

use App\Exceptions\PresenterException;
use App\Models\Route;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

final class ContentViewController extends Controller
{
    /** @throws PresenterException */
    public function index(Request $request, Route $route): View|string
    {
        //dd($route->present()->render());

        return view('render', [
            'content' => '',
        ]);
    }
}
