<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class BlogController extends Controller
{
    public function index(Request $request, int $routeId = null): View
    {
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

    public function indexWithSlug(int $routeId): View
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('blog', $this->data($routeId), compact('posts'));
    }
}
