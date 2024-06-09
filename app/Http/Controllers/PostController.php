<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{
    public function __invoke(Post $post): View
    {
        $locale = app()->getLocale();

        if ($post->published_at > now() || is_null($post->published_at)) {
            return abort(404);
        }

        if (view()->exists('posts.'.$locale.'.'.$post->slug)) {
            return view('posts.'.$locale.'.'.$post->slug, compact('post'));
        }

        if (view()->exists('posts.en.'.$post->slug)) {
            return view('posts.en.'.$post->slug, compact('post'));
        }

        return abort(404);
    }
}
