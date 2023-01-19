<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class StoreController extends Controller
{


    public function __invoke(\App\Http\Requests\Admin\Tag\StoreRequest $request)
    {
        $data = $request->validated();
        Tag::firstOrCreate(['title' => $data['title']]);
        return redirect()->route('admin.tag.index');
    }

}
