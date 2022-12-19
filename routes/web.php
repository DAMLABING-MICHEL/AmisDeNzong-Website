<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsEventsController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TestimonialController;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Route;

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
// Route::controller(IndexController::class)->group(function () {
//     Route::get('/', 'index');
// })->middleware('auth');
Route::get('/',[IndexController::class,'index']);
Route::controller(GalleryController::class)->group(function () {
    Route::get('/gallery','getImages'); 
});
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact','createForm'); 
    Route::post('/contact', 'ContactUsForm')->name('contact.store');
});
Route::controller(NewsEventsController::class)->group(function () {
    Route::get('/news-events','getNews'); 
    Route::get('/news-single/{id}','getNewsSingle'); 
});
Route::controller(PostController::class)->group(function () {
    Route::get('/blog','getPosts'); 
    Route::get('/blog-single/{slug}','getPost');
    Route::get('/blog/view-posts-by-categories/{slug}','getPostsByCategorySlug'); 
    Route::get('/blog/view-posts-by-tags/{slug}','getPostsByTagSlug'); 
    Route::post('/blog/search-posts','searchPosts'); 
});
Route::controller(CommentController::class)->group(function () {
    Route::post('/blog-single/{slug}','store'); 
    Route::get('/blog-single/{slug}/comments','comments');
    Route::delete('/blog-single/comments/{comment}','destroy');
});
Route::controller(AboutController::class)->group(function () {
    Route::get('/about','index');
});

Route::name('page')->get('page/{page:slug}', PageController::class);

Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware(['auth', 'is_verify_email']); 
Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify'); 
Route::get('event-single/{id}', [NewsEventsController::class, 'event'])->name('event'); 
    
// Profile
Route::middleware(['auth', 'password.confirm'])->group(function () {
    Route::view('profile', 'auth.profile');
    Route::name('profile')->put('profile', [RegisteredUserController::class, 'update']);
});

Route::get('newsletter.confirm/{email}',[NewsLetterController::class,'store']);
Route::get('newsletter.unsubscribe/{email}',[NewsLetterController::class,'unsubscribe']);
Route::post('newsletter',[NewsletterController::class,'newsletter']);
require __DIR__.'/auth.php';
