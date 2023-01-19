<?php

namespace App\Http\Controllers\Category\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Category $category)
    {
$posts = $category->posts;
/*
 * Можно использовать фильтр
 * $posts = $category->posts()->filter();
 */

        $posts = $category->posts()->paginate(6);


     return view('category.post.index', compact ('posts'));
    }
}
