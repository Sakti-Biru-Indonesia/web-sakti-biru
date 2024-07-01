<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\FeaturedArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class FeaturedArticleController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    // take 7 featured articles
    $featuredArticles = FeaturedArticle::take(7)->where('category_id', null)->get();
    $locale = App::getLocale();

    // map featured articles to get article and article translation
    $featuredArticles = $featuredArticles->map(function ($featuredArticle) use ($locale) {
      $article = $featuredArticle->article;
      $articleTranslation = $article->articleTranslation;

      return [
        'id' => $article->id,
        'title' => $articleTranslation->where('locale', $locale)->first()->title,
        'author' => $article->user->name,
        'category' => $article->category->name,
        'publish_date' => $article->published_at,
        'status' => $article->is_published,
        'featured_article' => $featuredArticle
      ];
    });

    return view('pages.dashboard.articles.featured_articles.index', compact('featuredArticles'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $article_id = $request->input('article_id');

    $request->validate([
      'article_id' => 'required|exists:App\Models\Article,id',
    ]);

    // parse article id to number
    $article_id = (int) $article_id;
    $article = Article::find($article_id);

    if (!$article->is_published) {
      return redirect()->back()->with('error', 'Featured article must be published article');
    }

    // check if article is already featured
    $featured = FeaturedArticle::where('article_id', $article_id)->where('category_id', null)->first();

    if ($featured) {
      return redirect()->back()->with('error', 'Article is already featured');
    }

    try {
      FeaturedArticle::create([
        'article_id' => $article_id
      ]);

      return redirect()->back()->with('success', 'Success Add this article to Featured Article');
    } catch (\Throwable $th) {

      return redirect()->back()->with('error', 'Failed Add this article to Featured Article');
    }
  }

  /**
   * Display the specified resource.
   */
  // public function show(FeaturedArticle $featuredArticle)
  // {
  //   //
  // }

  /**
   * Show the form for editing the specified resource.
   */
  // public function edit(FeaturedArticle $featuredArticle)
  // {
  //   //
  // }

  /**
   * Update the specified resource in storage.
   */
  // public function update(Request $request, FeaturedArticle $featuredArticle)
  // {
  //   //
  // }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(FeaturedArticle $featuredArticle)
  {
    try {
      $featuredArticle->delete();
      return redirect()->back()->with('success', 'Success Delete this article from Featured Article');
    } catch (\Throwable $th) {
      return redirect()->back()->with('error', 'Failed Delete this article from Featured Article');
    }
  }
}
