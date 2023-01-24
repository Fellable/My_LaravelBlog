<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\Admin\User\StoreRequest;
use App\Jobs\StoreUserJob;


class StoreController extends BaseController
{


    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        StoreUserJob::dispatch($data);

            return redirect()->route('admin.user.index');
        }
}
