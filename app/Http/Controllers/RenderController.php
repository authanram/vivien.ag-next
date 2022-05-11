<?php

namespace App\Http\Controllers;

use App\Exceptions\PresenterException;
use App\Models\Route;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

final class RenderController extends Controller
{
    /**
     * @throws PresenterException
     */
    public function index(Request $request, Route $route): View|string
    {
        return view('render', [
            'content' => $route->load('contentView')->contentView->present()->render(),
        ]);
    }
}
