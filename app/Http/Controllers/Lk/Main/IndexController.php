<?php

namespace App\Http\Controllers\Lk\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

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
