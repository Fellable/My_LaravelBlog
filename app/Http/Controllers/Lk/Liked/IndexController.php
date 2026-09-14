<?php

namespace App\Http\Controllers\Lk\Liked;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = auth()->user()->likedPosts;

        return view('lk.liked.index', compact('posts'));
    }
}
