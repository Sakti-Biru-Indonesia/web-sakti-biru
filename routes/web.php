<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\StaticContentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('lang/{locale}', [LanguageController::class, 'swap'])->name('lang.swap');

Route::get('/', [StaticContentController::class, 'home'])->name('home');
Route::get('/contact', function () {
  return view('pages.contact');
})->name('contact');

Route::get('/blog-news', [ArticleController::class, 'index'])->name('blog-news');
Route::get('/blog-news/{slug}', [ArticleController::class, 'details'])->name('blog-news.details');

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/{slug}', [ProductController::class, 'details'])->name('product.details');

// Dashboard
// Route::get('/dashboard', function () {
//   return view('pages.dashboard.home');
// })->middleware([])->name('dashboard.home');

Route::prefix('dashboard')->group(function () {

  Route::post('/logout', [UserController::class, 'logout'])->name('dashboard.logout');

  Route::middleware(['has_logged'])->group(function () {
    Route::get('/login', [UserController::class, 'login'])->name('dashboard.login');
    Route::post('/login', [UserController::class, 'signin'])->name('dashboard.signin');
  });

  Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'home'])->name('dashboard.home');

    Route::get('/articles', [ArticleController::class, 'list_article_admin'])->name('dashboard.articles');
    Route::get('/articles/create', [ArticleController::class, 'create_article_admin'])->name('dashboard.articles.create');
    Route::post('/articles/create', [ArticleController::class, 'store_article_admin'])->name('dashboard.articles.store');
  });

  Route::middleware(['auth', 'just_admin'])->group(function () {

    // Users
    Route::get('/create/user', [UserController::class, 'admin_create'])->name('dashboard.create.user');
    Route::post('/create/user', [UserController::class, 'create_user'])->name('dashboard.admin-create.user');
  });
});
