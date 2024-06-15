<?php

use App\Http\Controllers\ArticleController;
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

Route::get('/', function () {
  return view('pages.home');
})->name('home');

Route::get('/blog-news', [ArticleController::class, 'index'])->name('blog-news');
Route::get('/blog-news/{slug}', [ArticleController::class, 'details'])->name('blog-news.details');
