<?php

namespace App\Http\Controllers\Lk\Liked;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = auth()->user()->likedPosts;
        return view('lk.liked.index', compact('posts'));
    }
}
