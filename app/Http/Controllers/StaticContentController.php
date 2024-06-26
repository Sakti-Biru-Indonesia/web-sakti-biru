<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class StaticContentController extends Controller
{
  public function home()
  {
    return view('pages.home');
  }
}
