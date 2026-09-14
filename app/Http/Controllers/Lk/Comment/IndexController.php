<?php

namespace App\Http\Controllers\Lk\Comment;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $comments = auth()->user()->comments;

        return view('lk.comment.index', compact('comments'));
    }
}
