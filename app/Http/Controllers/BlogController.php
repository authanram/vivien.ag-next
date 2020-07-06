<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\View\View;

class BlogController extends Controller
{
    final public function index(): View
    {
        $args = \func_get_args();

        $routeId = $args[0] ?? null;

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

        return view('blog', $this->defaultData($routeId), [
            'posts' => $builder->get(),
            'slug' => $slug,
        ]);
    }

    final public function indexWithSlug(int $routeId, string $slug = null): View
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('blog', $this->defaultData($routeId), compact('posts'));
    }
}
