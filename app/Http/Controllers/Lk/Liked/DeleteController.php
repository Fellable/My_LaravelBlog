<?php

namespace App\Http\Controllers\Lk\Liked;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteController extends Controller
{
    public function __invoke(Post $post)
    {
    auth()->user()->likedPosts()->detach($post->id);
      return redirect()->route('lk.liked.index');
    }
}
