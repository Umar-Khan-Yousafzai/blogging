<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\UserController;

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
//Front end

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about-us');
Route::get('/privacy-policy', [HomeController::class, 'privacy'])->name('privacy-policy');
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact-us');
Route::post('/submit-contact-us', [HomeController::class, 'storeContact'])->name('submit-contact-us');
Route::post('/submit-newsletter', [HomeController::class, 'postNewsLetter'])->name('submit-news-letter');
Route::get('/category/{key}', [HomeController::class, 'categoryPage'])->name('category.page');
Route::get('blogs/{slug}', [HomeController::class, 'getBlog']);

Route::get('author-registration', [AuthController::class, 'showAuthorRegisterForm'])->name('author.register');
Route::post('register-author', [AuthController::class, 'registerAuthor'])->name('create.author');

Route::get('auth/google', [SocialController::class, 'googleRedirect'])->name('google.redirect');
Route::get('auth/google/callback', [SocialController::class, 'googleCallback']);
Route::get('auth/github', [SocialController::class, 'githubRedirect'])->name('github.redirect');
Route::get('auth/github/callback', [SocialController::class, 'githubCallback']);
Route::get('/search', [SearchController::class, 'search'])->name('search');

// Admin Side
Route::get('admin/login', [AuthController::class, 'showAdminLoginForm'])->name('admin.login');
Route::get('author/login', [AuthController::class, 'showAuthorLoginForm'])->name('author.login');
Route::post('login-form', [AuthController::class, 'login'])->name('login.perform');
// dd(auth()->user());
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::group(['prefix'=>'admin','middleware' => ['auth', 'admin']], function () {

    Route::get('/', function () {
        return view('admin.content.dashboard');
    })->name('admin.dashboard');


    Route::get('blogs/add', [BlogController::class, 'create'])->name('blogs.add');
    Route::post('blogs/store', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('blogs/edit/{id}', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::post('blogs/update', [BlogController::class, 'update'])->name('blogs.update');
    Route::get('blogs/delete/{id}', [BlogController::class, 'destroy'])->name('blogs.delete');
    Route::get('blogs/list', [BlogController::class, 'index'])->name('blogs.list');
    Route::get('contacts/list', [AdminController::class, 'contactList'])->name('contact.list');
    Route::post('blogs/update-status', [BlogController::class, 'updateStatus'])->name('blogs.status');

    Route::resource('users', 'App\Http\Controllers\UserController');
    Route::resource('categories', 'App\Http\Controllers\CategoryController');
    Route::post('category/update-status', [CategoryController::class, 'status'])->name('categories.status');

    Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');
});


