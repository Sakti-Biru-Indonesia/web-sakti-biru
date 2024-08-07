<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeaturedArticleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\StaticContentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionSenderController;
use App\Http\Controllers\UserProfileController;

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
Route::get('/blog-news/search', [ArticleController::class, 'search'])->name('blog-news-search');
Route::get('/blog-news/category', [ArticleController::class, 'list_articles_by_category'])->name('blog-news-category-list');
Route::get('/blog-news/{slug}', [ArticleController::class, 'details'])->name('blog-news.details');

Route::get('/products', [ProductController::class, 'list'])->name('products');
Route::get('/products/{slug}', [ProductController::class, 'details'])->name('product.details');

Route::post('/send-message', [QuestionSenderController::class, 'store'])->name('send-message');

// Dashboard
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
    Route::delete('/articles/{id}', [ArticleController::class, 'destroy_article_admin'])->name('dashboard.articles.destroy');
    Route::get('/articles/{id}', [ArticleController::class, 'edit_article_admin'])->name('dashboard.articles.edit');
    Route::patch('/articles/{id}', [ArticleController::class, 'update_article_admin'])->name('dashboard.articles.update');

    Route::get('user_profiles/create', [UserProfileController::class, 'create'])->name('user_profiles.create');
    Route::post('user_profiles', [UserProfileController::class, 'store'])->name('user_profiles.store');

    Route::get('change-password', [UserProfileController::class, 'showChangePasswordForm'])->name('password.change');
    Route::post('change-password', [UserProfileController::class, 'changePassword'])->name('password.update');
  });

  Route::middleware(['auth', 'just_admin'])->group(function () {

    // Users
    Route::get('/create/user', [UserController::class, 'admin_create'])->name('dashboard.create.user');
    Route::post('/create/user', [UserController::class, 'create_user'])->name('dashboard.admin-create.user');
    Route::resource('/products', ProductController::class);
    Route::resource('/categories', CategoryController::class);

    Route::get('/messages', [QuestionSenderController::class, 'index'])->name('dashboard.messages');
    Route::get('/messages/{id}', [QuestionSenderController::class, 'show'])->name('dashboard.show');

    Route::resource('/featured-articles', FeaturedArticleController::class);

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
  });
});
