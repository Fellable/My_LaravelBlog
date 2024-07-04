<?php

namespace App\Http\Controllers\API\POST;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\Post\PostShowResourse;
use App\Http\Resources\Post\PostResource;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        return new PostShowResourse($post);
    }
}
