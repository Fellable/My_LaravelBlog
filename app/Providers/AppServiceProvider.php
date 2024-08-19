<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Sentry\Breadcrumb;
use Sentry\Laravel\Facade as Sentry;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::setLocale('ru_RU');
        Paginator::useBootstrap();
        // Раскомментировать для Sentry
//        DB::listen(function ($query) {
//            Sentry::addBreadcrumb(
//                new Breadcrumb(
//                    Breadcrumb::LEVEL_INFO,
//                    Breadcrumb::TYPE_DEFAULT,
//                    'query',
//                    $query->sql,
//                    [
//                        'bindings' => $query->bindings,
//                        'time' => $query->time,
//                    ]
//                )
//            );
//        });
    }
}
