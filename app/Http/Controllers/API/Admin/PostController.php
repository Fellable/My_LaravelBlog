<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Resources\Admin\PostResource;
use Illuminate\Http\Request;

use App\Models\Post;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function store(StoreRequest $request)
    {
        $data = $request->validationData();
        $post = Post::create($data);
        return PostResource::make($post)->resolve();

    }


    public function sort(Request $request)
    {
        $order = $request->input('order');

        if (!$order) {
            return response()->json(['status' => 'error', 'message' => 'Invalid order data'], 400);
        }
             Log::info('Order data received:', $order);


        foreach ($order as $item) {
            $post = Post::find($item['id']);
            if ($post) {
                $post->queuery = $item['position'];
                $post->save();
            }
        }

        return response()->json(['status' => 'success']);
    }

    public function updateActive(Request $request, Post $post)
    {
        $active = $request->input('active');

        if ($active !== null) {
            $post->active = (bool) $active;
            $post->save();
            return response()->json(['status' => 'success']);
        }

        return response()->json(['status' => 'error', 'message' => 'Invalid active data'], 400);
    }
}
