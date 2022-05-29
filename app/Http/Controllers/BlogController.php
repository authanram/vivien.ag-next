<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Route;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

final class BlogController extends Controller
{
    public function index(Request $request, Route $route = null): View
    {
        return view('blog');

        $args = func_get_args();
        $slug = null;

        if (count($args) > 2) {
            abort(404);
        } elseif (count($args) === 2) {
            [$slug, $routeId] = $args;
        }

        $builder = Post::orderBy('created_at', 'desc');

        if ($slug) {
            $builder->where('slug', $slug);
        }

        return view('blog', $this->data($routeId), [
            'posts' => $builder->get(),
            'slug' => $slug,
        ]);
    }

    public function detail(int $routeId): View
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('blog', $this->data($routeId), compact('posts'));
    }
}
