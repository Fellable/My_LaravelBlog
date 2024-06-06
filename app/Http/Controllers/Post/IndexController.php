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
        $posts = Post::filter($filter)->orderBy('queuery', 'asc')->paginate(6);

        $countPosts = Post::all()->count();
        $tags = Tag::all();

        if ($countPosts >= 4) {
            $randomPosts = Post::get()->random(4);
            $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);
        } else dd('Запустите сидер на заполнение БД. Ну или вручную из админки создайте 4 поста /admin');


        return view('post.index', compact('posts', 'tags', 'randomPosts', 'likedPosts', 'countPosts'));
    }
}
