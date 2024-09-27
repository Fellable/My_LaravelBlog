<?php

namespace App\Http\Controllers\API\Post;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\Post\PostShowResource;
use App\Models\Post;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        return PostShowResource::make($post)->resolve();
    }
}
