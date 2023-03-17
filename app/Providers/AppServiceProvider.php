<?php

namespace App\Providers;

use App\Models\Number;
use App\Services\PostService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

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
        require_once app_path("helpers.php");
        setlocale(LC_TIME, config('app.locale'));
        Schema::defaultStringLength(191);
        if (! App::runningInConsole()) {
            $postController = new PostService();
            $latestPosts = $postController->getLatestPosts(2);
               Blade::if('request', function ($url) {
                return request()->is($url);
            });
            $numbers = Number::all();
            View::share('latestPosts', $latestPosts);
            View::share('numbers',$numbers);
            
            View::composer('back.layout', function ($view) {
                $title = config('titles.' . Route::currentRouteName());
                $view->with(compact('title'));
            });
        }
        
        
        Paginator::useBootstrap();
    }
}
