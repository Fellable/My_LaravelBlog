<?php

use App\Http\Controllers\Api\Admin\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\POST\ShowController;

Route::post('/test_posts', [PostController::class, 'store']);

Route::group(['namespace' => 'App\Http\Controllers\API\Post', 'prefix' => 'post'], function () {
    Route::get('/{post}', 'ShowController')->name('admin.show.get');
});

Route::group(['prefix' => '/admin'], function () {
    Route::group(['prefix' => '/post'], function () {
        Route::get('/{post}', [ShowController::class])->name('show.get');
    });


    Route::group(['prefix' => '/posts'], function () {
        Route::put('/sort', [PostController::class, 'sort'])->name('api.posts.sort'); // сохраняем место, куда перетянули через sortablejs
        Route::put('/{post}/active', [PostController::class, 'updateActive'])->name('api.posts.active'); // toggle активность поста
    });
});


// JWT - активен
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
//    Route::post('login', 'App\Http\Controllers\AuthController@login');
//    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
//    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
//    Route::post('me', 'App\Http\Controllers\AuthController@me');

    Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('refresh', [\App\Http\Controllers\AuthController::class, 'refresh']);
    Route::post('me', [\App\Http\Controllers\AuthController::class, 'me']);
});


Route::group(['namespace' => 'App\Http\Controllers\Admin\Post', 'middleware' => 'jwt.auth', 'prefix' => 'admin/posts'], function () {
    Route::get('/', 'IndexController');
    Route::get('/create', 'CreateController');
    Route::post('/', 'StoreController');
    Route::get('/{post}', 'ShowController');
});


