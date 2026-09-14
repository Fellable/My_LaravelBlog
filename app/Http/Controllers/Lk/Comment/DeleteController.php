<?php

namespace App\Http\Controllers\Lk\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class DeleteController extends Controller
{
    public function __invoke(Comment $comment)
    {
        $comment->delete();

        return view('lk.comment.index', compact('comment'));
    }
}
