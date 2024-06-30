<?php

namespace App\Http\Controllers;

use App\Enums\PostType;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('home', [
            'title' => __('home.title'),
            'postsByYear' => $this->getPosts(),
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

        if ($request->ajax()) {
            return view('home', [
                'title' => __('home.title'),
                'postsByYear' => $this->getPosts(),
            ])->fragment('posts');
        }

        return redirect()->to(url()->previous());
    }

    public function getPosts(): Collection
    {
        $posts = Post::published()->orderBy('published_at', 'desc');

        if (session('type')) {
            $posts = $posts->where('type', session('type'));
        }

        return $posts->get()
            ->groupBy(function ($post) {
                return Carbon::parse($post->published_at)->format('Y');
            });
    }
}
