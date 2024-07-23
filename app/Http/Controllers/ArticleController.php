<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleTranslation;
use App\Models\Category;
use App\Models\FeaturedArticle;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{

  public function index()
  {
    // get categories that has published articles from database and change it to array
    $categories = new Category();
    $categories = $categories->get();

    $categories = $categories->filter(function ($category) {
      if ($category->hasPublishedArticles()) {
        return $category;
      }
    });

    $users = User::all();

    $featuredArticleCount = FeaturedArticle::count();

    return view('pages.blog-news.list', compact('categories', 'featuredArticleCount', 'users'));
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
    }

    $user = User::where('id', $article->user_id)->first();

    if (!$articleContent) {
      abort(404);
    }

    return view('pages.blog-news.details', compact('article', 'articleContent', 'user'));
  }

  public function list_articles_by_category()
  {
    $locale = App::getLocale();
    $categorySlug = request('category');

    $category = Category::where('slug', $categorySlug)->first();

    // get all articles from database by category
    // paginate 8
    $articles = Article::where('is_published', true)->where('category_id', $category->id)->paginate(10);
    $articles->appends([
      'category' => $categorySlug
    ]);

    $mappedArticles = $articles->map(function ($article) use ($locale) {
      $articleTranslation = $article->articleTranslation->where('locale', $locale)->first();
      return [
        'id' => $article->id,
        'title' => $articleTranslation->title,
        'slug' => $articleTranslation->slug,
        'publish_date' => Carbon::parse($article->published_at)->format('F j, Y'),
        'sub_headline' => substr($articleTranslation->sub_headline, 0, 75) . '...',
        'image_banner_url' => str_replace('public', 'storage', $article->image_banner_url),
        'author' => $article->user->name
      ];
    });

    return view('pages.blog-news.list-category', compact('category', 'articles', 'mappedArticles'));
  }

  public function search()
  {
    $query = request('query');

    if (!$query) {
      return redirect()->route('blog-news');
    }

    $locale = App::getLocale();

    // just get articles from database where same locale
    $articles = ArticleTranslation::where('locale', $locale)
      ->where(function ($q) use ($query) {
        $q->where('title', 'like', '%' . $query . '%')
          ->orWhere('sub_headline', 'like', '%' . $query . '%')
          ->orWhere('content', 'like', '%' . $query . '%');
      })
      ->paginate(10);


    $articles->appends([
      'query' => $query
    ]);

    $mappedArticles = $articles->map(function ($article) {
      return [
        'id' => $article->metaData->id,
        'language' => $article->locale,
        'title' => $article->title,
        'slug' => $article->slug,
        'publish_date' => Carbon::parse($article->article->published_at)->format('F j, Y'),
        'sub_headline' => substr($article->sub_headline, 0, 75) . '...',
        'image_banner_url' => str_replace('public', 'storage', $article->metaData->image_banner_url),
        'author' => $article->article->user->name
      ];
    });

    return view('pages.blog-news.search', compact('articles', 'query', 'mappedArticles'));
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
        // $locale
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
    // if ($article->user_id !== Auth::user()->id) {
    //   return back()->with('error', 'You are not the author of this article');
    // }
    if (($article->user_id !== Auth::user()->id)) {
      if (Auth::user()->role !== 'ADMIN') {
        return back()->with('error', 'Cannot edit this article, you are not the author');
      }
    }

    DB::beginTransaction();

    try {
      // delete image
      Storage::delete($article->image_banner_url);

      // delete article
      $article->delete();

      // delete article translation
      $article->articleTranslation->each(function ($translation) {
        $translation->delete();
      });

      DB::commit();

      return redirect()->route('dashboard.articles')->with('success', 'Success Delete Article');
    } catch (\Throwable $th) {
      DB::rollBack();
      return redirect()->route('dashboard.articles')->with('error', 'Failed Delete Article');
    }
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
    // if (($article->user_id !== Auth::user()->id)) {
    //   if (Auth::user()->role !== 'ADMIN') {
    //     return back()->with('error', 'Cannot edit this article, you are not the author');
    //   }
    // }

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
      'featured' => $article->featuredArticle,
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
      if (($article->user_id !== Auth::user()->id)) {
        if (Auth::user()->role !== 'ADMIN') {
          return back()->with('error', 'Cannot edit this article, you are not the author');
        }
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
    $article = new Article();

    if (!in_array($locale, $article->locales)) {
      throw new Exception('Invalid Locale');
    }

    return true;
  }
}
