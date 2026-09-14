<?php

namespace App\Http\Controllers\Lk\Main;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $likedPosts = auth()->user()->likedPosts;
        $countLikedPosts = count($likedPosts);
        $comments = auth()->user()->comments;
        $countComments = count($comments);

        return view('lk.main.index', compact('countLikedPosts', 'countComments'));
    }
}
