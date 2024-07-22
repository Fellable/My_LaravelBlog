<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\Admin\User\StoreRequest;
use App\Jobs\StoreUserJob;


class StoreController extends BaseController
{


    public function __invoke(StoreRequest $request)
    {
        try{
            $data = $request->validated();
            StoreUserJob::dispatch($data);

            return redirect()->route('admin.user.index');
        } catch (\Throwable $exception){
            return $exception;
        }

        }
}
