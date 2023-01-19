<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class EditController extends BaseController
{
    /**
     * @param Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
      return view('admin.post.edit', compact ('post', 'categories', 'tags'));
    }
}
