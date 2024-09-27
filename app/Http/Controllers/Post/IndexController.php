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
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;


class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);

        // Заранее загружаем теги и лайки для постов
        $posts = Post::with('tags', 'likedUsers')->filter($filter)->orderBy('queuery', 'asc')->paginate(6);
        $countPosts = Post::count();








        // Кешируем теги
        $tags = Cache::remember('tags', 60, function () {
            return Tag::all();
        });

        // Проверяем количество постов и готовим рандомные посты
        if ($countPosts >= 4) {
            $randomPosts = Post::inRandomOrder()->limit(4)->get();
            $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->limit(4)->get();
        } else {
            dd('Запустите сидер на заполнение БД или создайте вручную 4 поста /admin');
        }

        return view('post.index', compact('posts', 'tags', 'randomPosts', 'likedPosts', 'countPosts'));
    }
}
