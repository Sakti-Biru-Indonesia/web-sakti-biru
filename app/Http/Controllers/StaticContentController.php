<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class StaticContentController extends Controller
{
  public function home()
  {
    // Take 3 newest articles

    $locale = App::getLocale();
    $articles = Article::where('is_published', true)->orderBy('created_at', 'desc')->take(3)->get();

    $articles = $articles->map(function ($article) use ($locale) {
      $articleTranslation = $article->articleTranslation->where('locale', $locale)->first();
      return [
        'id' => $article->id,
        'title' => $articleTranslation->title,
        'slug' => $articleTranslation->slug,
        'image_banner_url' => str_replace('public', 'storage', $article->image_banner_url),
        'publish_date' => $article->published_at,
        'author' => $article->user->name
      ];
    });

    return view('pages.home', compact('articles'));
  }
}
