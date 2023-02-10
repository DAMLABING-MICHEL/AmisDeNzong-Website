<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Back\AdminController;
use App\Http\Controllers\Back\NewsController;
use App\Http\Controllers\Back\PostController as BackPostController;
use App\Http\Controllers\Back\ResourceController;
use App\Http\Controllers\Back\TagController;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\NewsEventsController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::controller(StaffController::class)->group(function () {
    Route::get('staff', 'staff');
});
Route::get('/',[IndexController::class,'index'])->name('home');
Route::controller(ImageController::class)->group(function () {
    Route::get('/gallery','getImages'); 
});
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact','createForm'); 
    Route::post('/contact', 'ContactUsForm')->name('contact.store');
});
Route::controller(NewsEventsController::class)->group(function () {
    Route::get('/news-events','index'); 
    Route::get('/news-single/{id}','getNewsSingle')->name('news-single'); 
});
Route::controller(PostController::class)->group(function () {
    Route::get('/blog','getPosts'); 
    Route::get('blog-single/{slug}','getPost')->name('posts.display');
    Route::get('/blog/view-posts-by-categories/{slug}','getPostsByCategorySlug'); 
    Route::get('/blog/view-posts-by-tags/{slug}','getPostsByTagSlug'); 
    Route::post('/blog/search-posts','searchPosts'); 
});
Route::controller(CommentController::class)->group(function () {
    Route::post('/blog-single/{slug}','store')->name('storeComment'); 
    Route::get('/blog-single/{slug}/comments','comments');
    Route::delete('/blog-single/comments/{comment}','destroy');
});
Route::controller(AboutController::class)->group(function () {
    Route::get('/about','index')->name('about');
});

Route::name('page')->get('page/{page:slug}', PageController::class);

Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware(['auth', 'is_verify_email']); 
Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify'); 
Route::get('event-single/{id}', [NewsEventsController::class, 'event'])->name('event'); 


// Route qui permet de connaître la langue active
Route::get('locale', [LocalizationController::class,'getLang'])->name('getlang');

// Route qui permet de modifier la langue
Route::get('locale/{lang}', [LocalizationController::class,'setLang'])->name('setlang');

    
// Profile
Route::middleware(['auth', 'password.confirm'])->group(function () {
    Route::view('profile', 'auth.profile');
    Route::name('profile')->put('profile', [RegisteredUserController::class, 'update']);
});

Route::get('newsletter.confirm/{email}',[NewsLetterController::class,'store']);
Route::get('newsletter.unsubscribe/{email}',[NewsLetterController::class,'unsubscribe']);
Route::post('newsletter',[NewsletterController::class,'newsletter']);

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => 'auth'], function () {
    Lfm::routes();
});
// admin routes
Route::prefix('admin')->group(function () {
    Route::middleware('redac')->group(function () {
        Route::name('admin')->get('/', [AdminController::class, 'index']);
        Route::name('purge')->put('purge/{model}', [AdminController::class, 'purge']);
        Route::resource('posts', BackPostController::class)->except('show','create');
        Route::name('posts.create')->get('posts/create/{id?}', [BackPostController::class, 'create']);
        Route::name('tags.addTag')->post('addTag', [TagController::class, 'addTag']);
        Route::resource('tags', TagController::class)->except(['show']);
          // Comments
          Route::resource('comments', ResourceController::class)->except(['show', 'create', 'store']);
          Route::name('comments.indexnew')->get('newcomments', [ResourceController::class, 'index']); 
    });
    Route::middleware('admin')->group(function () {
        Route::name('posts.indexnew')->get('newposts', [BackPostController::class, 'index']);
        Route::resource('categories', ResourceController::class)->except(['show']);
        Route::resource('staff', ResourceController::class)->except(['show']);
        Route::resource('images', ResourceController::class)->except(['show']);
        Route::resource('news', NewsController::class)->except(['show']);
        Route::resource('events', ResourceController::class)->except(['show']);
        Route::resource('testimonials', ResourceController::class)->except(['show']);
         // Users
         Route::resource('users', UserController::class)->except(['show', 'create', 'store']);;
         Route::name('users.indexnew')->get('newusers', [ResourceController::class, 'index']);
                // Contacts
        Route::resource('contacts', ResourceController::class)->only(['index', 'destroy']);
        Route::name('contacts.indexnew')->get('newcontacts', [ResourceController::class, 'index']);
    });
});
require __DIR__.'/auth.php';
