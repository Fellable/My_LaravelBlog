<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

     $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(10);


        $count = Post::all()->count();
        $tags = Tag::all();

        if ($count >= 4) {
            $randomPosts = Post::get()->random(4);
            $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);
        }
        else dd('Вам необходимо создать минимум 4 поста из админки /admin');



     return view('post.index', compact ('posts', 'tags', 'randomPosts', 'likedPosts'));
    }
}
