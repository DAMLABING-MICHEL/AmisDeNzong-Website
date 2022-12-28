<?php

namespace App\Providers;

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Follow;
use App\Models\Number;
use App\Models\Page;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\View\View;

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
        Schema::defaultStringLength(255);
        
        $postController = new PostController();
        $latestPosts = $postController->latestPosts();
           Blade::if('request', function ($url) {
            return request()->is($url);
        });
        $numbers = Number::all();
        FacadesView::share('latestPosts', $latestPosts);
        FacadesView::share('numbers',$numbers);
    }
    public function compose(View $view)
    {
        $view->with([
            'categories' => Category::has('posts')->get(),
            'pages'      => Page::select('slug', 'title')->get(),
            'follows'    => Follow::all(),
        ]);
    }
}
