<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Resources\Admin\PostResource;
use Illuminate\Http\Request;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
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


        DB::beginTransaction();
        try {
            foreach ($order as $item) {
                $post = Post::find($item['id']);
                if (!$post) {
                    throw new \Exception("Post with ID {$item['id']} not found");
                }
                $post->queuery = $item['position'];
                $post->save();
            }
            DB::commit(); // Фиксируем транзакцию, если все прошло успешно
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in sort operation:', ['error' => $e->getMessage()]);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 400);
        }
    }

    public function updateActive(Request $request, Post $post)
    {
        $active = $request->input('active');
        if ($active !== null) {
            $post->active = (bool)$active;
            $post->save();
            return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'error', 'message' => 'Invalid active data'], 400);
    }
}
