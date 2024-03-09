<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $postsByYear = Post::published()
            ->orderBy('published_at', 'desc')
            ->get()
            ->groupBy(function ($post) {
                return Carbon::parse($post->published_at)->format('Y');
            });

        return view('home', [
            'title' => __('home.title'),
            'postsByYear' => $postsByYear,
        ]);
    }
}
