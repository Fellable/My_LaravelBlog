<?php


use App\Http\Controllers\Admin\Category\CreateController;
use App\Http\Controllers\Admin\Category\DeleteController;
use App\Http\Controllers\Admin\Category\EditController;
use App\Http\Controllers\Admin\Category\ShowController;
use App\Http\Controllers\Admin\Category\StoreController;
use App\Http\Controllers\Admin\Category\StoreController as StoreControllerAlias;
use App\Http\Controllers\Admin\Category\UpdateController;
use App\Http\Controllers\Admin\Main\AdminController;
use App\Http\Controllers\Admin\Post\PostController;
use App\Http\Controllers\Admin\Tag\TagController;
use App\Http\Controllers\Admin\User\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\IndexController;


Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
    Route::get('/', IndexController::class)->name('main.index');
});

Route::prefix('admin')->group(function () {
    Route::group(['namespace' => 'App\Http\Controllers\Admin\Main', 'middleware'=> ['auth','admin']] , function () {
        Route::get('/', 'IndexController')->name('admin.main.index');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Admin\Category', 'prefix' => 'admin/category'], function () {
    Route::get('/', 'IndexController')->name('admin.category.index');
    Route::get('/create', 'CreateController')->name('admin.category.create');
    Route::post('/categories', 'StoreController')->name('admin.category.store');
    Route::get('/{category}', 'ShowController')->name('admin.category.show');
    Route::get('/{category}/edit', 'EditController')->name('admin.category.edit');
    Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
    Route::delete('/{category}', 'DeleteController')->name('admin.category.delete');
});


Route::group(['namespace' => 'App\Http\Controllers\Admin\Tag', 'prefix' => 'admin/tags'], function () {
    Route::get('/', 'IndexController')->name('admin.tag.index');
    Route::get('/create', 'CreateController')->name('admin.tag.create');
    Route::post('/categories', 'StoreController')->name('admin.tag.store');
    Route::get('/{tag}', 'ShowController')->name('admin.tag.show');
    Route::get('/{tag}/edit', 'EditController')->name('admin.tag.edit');
    Route::patch('/{tag}', 'UpdateController')->name('admin.tag.update');
    Route::delete('/{tag}', 'DeleteController')->name('admin.tag.delete');
});


Route::group(['namespace' => 'App\Http\Controllers\Admin\Post', 'prefix' => 'admin/posts'], function () {
    Route::get('/', 'IndexController')->name('admin.post.index');
    Route::get('/create', 'CreateController')->name('admin.post.create');
    Route::post('/', 'StoreController')->name('admin.post.store');
    Route::get('/{post}', 'ShowController')->name('admin.post.show');
    Route::get('/{post}/edit', 'EditController')->name('admin.post.edit');
    Route::patch('/{post}', 'UpdateController')->name('admin.post.update');
    Route::delete('/{post}', 'DeleteController')->name('admin.post.delete');
});


Route::group(['namespace' => 'App\Http\Controllers\Admin\User', 'prefix' => 'admin/users', 'middleware' => ['verified']], function () {
    Route::get('/', 'IndexController')->name('admin.user.index');
    Route::get('/create', 'CreateController')->name('admin.user.create');
    Route::post('/users', 'StoreController')->name('admin.user.store');
    Route::get('/{user}', 'ShowController')->name('admin.user.show');
    Route::get('/{user}/edit', 'EditController')->name('admin.user.edit');
    Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
    Route::delete('/{user}', 'DeleteController')->name('admin.user.delete');
});



Route::group(['namespace' => 'App\Http\Controllers\Lk', 'prefix' => 'lk', 'middleware' => ['auth']], function () {
    Route::group(['namespace' => 'Main', 'prefix' => 'main'], function () {
        Route::get('/', 'IndexController')->name('lk.main.index');
    });
    Route::group(['namespace' => 'Liked', 'prefix' => 'liked', 'middleware' => ['auth']], function () {
        Route::get('/', 'IndexController')->name('lk.liked.index');
        Route::delete('/{post}', 'DeleteController')->name('lk.liked.delete');
    });

    Route::group(['namespace' => 'Comment', 'prefix' => 'comment', 'middleware' => ['auth']], function () {
        Route::get('/', 'IndexController')->name('lk.comment.index');
        Route::get('/{comment}/edit', 'EditController')->name('lk.comment.edit');
        Route::patch('/{comment}', 'UpdateController')->name('lk.comment.update');
        Route::delete('/{comment}', 'DeleteController')->name('lk.comment.delete');
    });
});

/**
 * Обо мне. Пока не заполнено
 */
Route::group(['namespace' => 'App\Http\Controllers\I_am', 'prefix' => 'about'], function () {
    Route::group(['namespace' => 'About'], function () {
        Route::get('/', 'IndexController')->name('about.index');
    });
    Route::group(['namespace' => 'Find_work'], function () {
        Route::get('/find_work', 'IndexController')->name('about.find_work');
    });
});




// Фронтенд. Посты, лайки. Вообще, можно было в апи перекинуть, но пока не за чем - vuejs только слайдер
Route::group(['namespace' => 'App\Http\Controllers\Post', 'prefix' => 'posts'], function () {
    Route::get('/', 'IndexController')->name('post.index');
    Route::get('/{post}', 'ShowController')->name('post.show');
    Route::group(['namespace' => 'Comment', 'prefix' => '{post}/comments'], function () {
        Route::post('/', 'StoreController')->name('post.comment.store');
    });

    Route::group(['namespace' => 'Like', 'prefix' => '{post}/likes'], function () {
        Route::post('/', 'StoreController')->name('post.like.store');
    });
});


// "Категории" на мейн странице
Route::group(['namespace' => 'App\Http\Controllers\Category', 'prefix' => 'categories'], function () {
    Route::get('/', 'IndexController')->name('category.index');
    Route::group(['namespace' => 'Post', 'prefix' => '{category}/posts'], function () {
        Route::get('/', 'IndexController')->name('category.post.index');
    });
});


Auth::routes(['verify' => true]);

