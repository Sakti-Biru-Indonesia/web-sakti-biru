<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
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
    return view('pages.blog-news.list');
  }
  public function details($slug)
  {

    $res = Http::get('https://fakenews.squirro.com/news/finance');

    $bodyContent = $res->object()->news[0]->body;
    $author = $res->object()->news[0]->author;
    $abstract = $res->object()->news[0]->abstract;
    $publishDate = $res->object()->news[0]->date;

    return view('pages.blog-news.details', compact('bodyContent', 'author', 'abstract', 'publishDate'));
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
    if (!in_array($locale, $this->availableLocale)) {
      return back()->with('error', 'Invalid Locale');
    }

    try {
      // Insert Article
      $articleModel = new Article();

      $article = $articleModel->insertArticle(
        Auth::user()->id,
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

      return redirect()->route('dashboard.articles')->with('success', 'Success Create Article');
    } catch (\Throwable $th) {
      $message = $th->getMessage();

      return back()->with('error', $message)->withInput();
    }
  }
}
