<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Resources\Admin\PostResource;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validationData();
        $this->service->store($data);
        return redirect()->route('admin.post.index');
    }
}
