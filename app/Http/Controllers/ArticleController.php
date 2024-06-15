<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{

  public function index()
  {
    return view('pages.blog-news.list');
  }
  public function details()
  {
    return view('pages.blog-news.details');
  }
}
