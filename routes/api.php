<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\POST\ShowController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*

Route::group(['prefix' => 'post'], function() {
    Route::get('/{post}', App\Http\Controllers\API\Post\ShowController::class);
});

*/


Route::group(['namespace' => 'App\Http\Controllers\API\POST', 'prefix'=> 'post'], function () {
    Route::get('/{post}', 'ShowController')->name('show.get');
    });
    
    
    
    
    


    
    
    

/**
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');

});
Route::group(['namespace' => 'App\Http\Controllers\Admin\Post', 'middleware' => 'jwt.auth', 'prefix' => 'admin/posts'], function () {
    Route::get('/', 'IndexController');
    Route::get('/create', 'CreateController');
    Route::post('/', 'StoreController');
    Route::get('/{post}', 'ShowController');

});

*/
