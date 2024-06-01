<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{
    public function __invoke(string $slug): View
    {
        $locale = app()->getLocale();
        $post = Post::where('slug', $slug)->first();

        if ($post?->published) {
            return view()->first([
                'posts.'.$locale.'.'.$post->slug,
                'posts.en.'.$post->slug,
                abort(404)
            ]);
        }

        return abort(404);
    }
}
