<?php

namespace App\Providers;

use App\Models\Number;
use App\Services\PostService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View as FacadesView;

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
        //
        Schema::defaultStringLength(191);
        if (! App::runningInConsole()) {
            $postController = new PostService();
            $latestPosts = $postController->getLatestPosts(2);
               Blade::if('request', function ($url) {
                return request()->is($url);
            });
            $numbers = Number::all();
            FacadesView::share('latestPosts', $latestPosts);
            FacadesView::share('numbers',$numbers);
        }
    }
}
