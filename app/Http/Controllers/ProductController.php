<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index()
  {
    $products = [
      1, 2, 3, 4, 5, 6, 7, 8
    ];

    return view('pages.product.list', compact('products'));
  }
}
