<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ArticleController extends Controller
{

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
}
