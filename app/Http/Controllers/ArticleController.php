<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleTranslation;
use App\Models\Category;
use App\Models\User;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ArticleController extends Controller
{

  // List of available locale for article translation
  private $availableLocale = ['id', 'en'];

  public function index()
  {
    // get categories from database and change it to array
    $categories = Category::all();
    return view('pages.blog-news.list', compact('categories'));
  }
  public function details($slug)
  {
    $locale = App::getLocale();
    $articleTranslation = ArticleTranslation::where('slug', $slug)->first();

    if (!$articleTranslation) {
      abort(404);
    }

    $article = Article::where('id', $articleTranslation->article_id)->first();
    $articleContent = ArticleTranslation::where('article_id', $articleTranslation->article_id)->where('locale', $locale)->first();

    // if article is not published
    // or article publish date is in future
    // or article publish date is null
    if (!$article->is_published || $article->published_at > now()->toDate() || !$article->published_at) {
      abort(404);
    };

    $user = User::where('id', $article->user_id)->first();

    if (!$articleContent) {
      abort(404);
    }

    return view('pages.blog-news.details', compact('article', 'articleContent', 'user'));
  }

  public function list_article_admin()
  {
    // get all articles from database with author name and category name
    $articles = Article::with('user', 'category', 'articleTranslation')->get();

    $articlesList = $articles->map(function ($article) {
      return [
        'id' => $article->id,
        'title' => $article->articleTranslation->first()->title,
        'category' => $article->category->name,
        'user_name' => $article->user->name,
        'status' => $article->is_published,
        'publish_date' => $article->published_at,
      ];
    });

    return view('pages.dashboard.articles.list', compact('articlesList'));
  }

  public function create_article_admin()
  {
    $categories = Category::all();

    return view('pages.dashboard.articles.create', [
      'categories' => $categories
    ]);
  }

  public function store_article_admin(Request $request)
  {
    $title = $request->title;
    $sub_headline = $request->sub_headline;
    $publish_date = $request->publish_date;
    $publish_status = $request->publish_status === 'publish' ? true : false;
    $content = $request->content;
    $category_id = $request->category;
    $image = $request->file('image_banner');
    $locale = App::getLocale();

    // validate all input
    $request->validate([
      'title' => 'required|min:10',
      'sub_headline' => 'required|min:10',
      // publish date can be null in case of draft
      'publish_date' => 'date|nullable',
      'publish_status' => 'required|in:draft,publish',
      'content' => 'required|min:10',
      'category' => 'required|exists:App\Models\Category,id',
      'image_banner' => 'required|image|mimes:jpeg,png,jpg|max:3048',
    ]);

    // check if locale is available
    $this->check_available_locale();

    try {
      // Insert Article
      $articleModel = new Article();

      $article = $articleModel->insertArticle(
        Auth::user()->id,
        $title,
        $sub_headline,
        $image,
        $publish_date,
        $publish_status,
        $category_id,
        $content,
        $locale
      );

      if (!$article['status']) {
        throw new Exception($article['message']);
      }

      return redirect()->route('dashboard.articles')->with('success', 'Success Create Article');
    } catch (\Throwable $th) {
      $message = $th->getMessage();

      return back()->with('error', $message)->withInput();
    }
  }

  public function destroy_article_admin($id)
  {
    // check if article exists
    $article = Article::find($id);
    if (!$article) {
      return back()->with('error', 'Article not found');
    }

    // check if current user is the author of the article
    if ($article->user_id !== Auth::user()->id) {
      return back()->with('error', 'You are not the author of this article');
    }

    // delete article
    $article->delete();
    return redirect()->route('dashboard.articles')->with('success', 'Success Delete Article');
  }

  public function edit_article_admin($id)
  {

    $locale = App::getLocale();

    // check if article exists
    $article = Article::find($id);
    if (!$article) {
      return back()->with('error', 'Article not found');
    }

    // if user is the author of the article and is not admin
    if (($article->user_id !== Auth::user()->id) && !Auth::user()->role !== 'ADMIN') {
      return back()->with('error', 'Cannot edit this article, you are not the author');
    }

    // if article translation with current locale is not found, just use other article translation with other locale
    $articleTranslation = $article->articleTranslation->where('locale', $locale)->where('article_id', $id)->first();

    if (!$articleTranslation) {
      $articleTranslation = $article->articleTranslation->where('article_id', $id)->first();
    }

    $categories = Category::all();

    return view('pages.dashboard.articles.edit', [
      'id' => $id,
      'categories' => $categories,
      'article' => $article,
      'articleTranslation' => $articleTranslation
    ]);
  }

  public function update_article_admin($id, Request $request)
  {

    $title = $request->title;
    $sub_headline = $request->sub_headline;
    $publish_date = $request->publish_date;
    $publish_status = $request->publish_status === 'publish' ? true : false;
    $content = $request->content;
    $category_id = $request->category;
    $image = $request->file('image_banner');
    $locale = App::getLocale();

    // validate all input for update
    $request->validate([
      'title' => 'required|min:10',
      'sub_headline' => 'required|min:10',
      // publish date can be null in case of draft
      'publish_date' => 'date|nullable',
      'publish_status' => 'required|in:draft,publish',
      'content' => 'required|min:10',
      'category' => 'required|exists:App\Models\Category,id',
      'image_banner' => 'image|mimes:jpeg,png,jpg|max:3048',
    ]);


    try {
      // check if article exists
      $article = Article::find($id);
      if (!$article) {
        throw new Exception('Article not found');
      }

      // check if current user is the author of the article
      if ($article->user_id !== Auth::user()->id) {
        throw new Exception('Cannot edit this article, you are not the author');
      }

      $this->check_available_locale();
      $this->publish_validation($publish_date, $publish_status);


      // update article
      $article = $article->updateArticle(
        $id,
        $locale,
        $title,
        $sub_headline,
        $image,
        $publish_date,
        $publish_status,
        $category_id,
        $content
      );

      if (!$article['status']) {
        throw new Exception($article['message']);
      }

      return redirect()->route('dashboard.articles')->with('success', 'Success Update Article');
    } catch (\Throwable $th) {
      return back()->with('error', $th->getMessage())->withInput();
    }
  }

  public function publish_validation($publish_date, $publish_status)
  {
    // check if article publish date is not in the past
    // if ($publish_status && $publish_date < date('Y-m-d')) {
    //   throw new Exception('Publish Date cannot be in the past');
    // }

    // chekc if article publish date must be present or future date
    if ($publish_status && $publish_date === null) {
      throw new Exception('Publish Date must be present or future date');
    }

    return true;
  }

  public function check_available_locale()
  {
    $locale = App::getLocale();

    if (!in_array($locale, $this->availableLocale)) {
      throw new Exception('Invalid Locale');
    }

    return true;
  }
}
