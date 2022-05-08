<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

final class RenderController extends Controller
{
    public function index(Request $request, Route $route): View|string
    {
        return $route->uri;
    }
}
