<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

final class ContentViewController extends Controller
{
    public function index(Request $request, Route $route): View|string
    {
        $contentView = $route->present()->resolveAction()->resolveContentViewControllerAction();

        dd($contentView->sections);

        return view('content-view', [
            'cacheKey' => __CLASS__.'@'.$contentView->id,
            'title' => 'foo',
            'content' => 'bar',
        ]);
    }
}
