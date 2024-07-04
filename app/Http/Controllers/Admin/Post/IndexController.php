<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Resources\Admin\PostResource;
use App\Models\Post;
use function Illuminate\Events\queueable;


class IndexController extends BaseController
{
    public function __invoke()
    {
        $posts = Post::orderBy('queuery')->get();

        return view('admin.post.index', compact('posts'));
    }
}
