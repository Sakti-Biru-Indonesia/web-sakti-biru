<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\StaticContentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionSenderController;

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

Route::post('/send-message', [QuestionSenderController::class, 'store'])->name('send-message');

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
    Route::get('/', function () {
      return view('pages.dashboard.home');
    })->name('dashboard.home');
  });

  Route::middleware(['auth', 'just_admin'])->group(function () {
    Route::get('/create/user', [UserController::class, 'admin_create'])->name('dashboard.create.user');
    Route::post('/create/user', [UserController::class, 'create_user'])->name('dashboard.admin-create.user');
    Route::get('/messages', [QuestionSenderController::class, 'index'])->name('dashboard.messages');
  });
});
