<?php

namespace App\Http\Controllers;

use App\Enums\PostType;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $posts = Post::published()->orderBy('published_at', 'desc');

        if (session('type')) {
            $posts = $posts->where('type', session('type'));
        }

        $postsByYear = $posts->get()
            ->groupBy(function ($post) {
                return Carbon::parse($post->published_at)->format('Y');
            });

        return view('home', [
            'title' => __('home.title'),
            'postsByYear' => $postsByYear,
        ]);
    }

    public function filterPosts(Request $request)
    {
        if (in_array($request->button, PostType::values())) {
            $request->session()->put('type', $request->button);
        }

        if ($request->button === 'all') {
            $request->session()->remove('type');
        }

        return redirect()->to(url()->previous())->withFragment('#posts');
    }
}
