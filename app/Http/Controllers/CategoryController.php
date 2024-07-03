<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    // get categories from database and order by order
    $categories = Category::orderBy('order', 'asc')->get();
    return view('pages.dashboard.articles.categories.list', compact('categories'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $categoryCount = Category::count();
    return view('pages.dashboard.articles.categories.create', compact('categoryCount'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $name = $request->input('name');
    $description = $request->input('description');
    $order = $request->input('order');

    // validate all input
    $request->validate([
      'name' => 'required|unique:App\Models\Category,name',
      'description' => 'required|min:10',
      'order' => 'required|integer|min:1',
    ]);

    Category::create([
      'name' => $name,
      'description' => $description,
      'order' => $order
    ]);

    return redirect()->back()->with('success', 'Category created successfully.');
  }

  /**
   * Display the specified resource.
   */
  public function show(Category $category)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Category $category)
  {
    $category = Category::find($category->id);
    $categoryCount = Category::count();
    return view('pages.dashboard.articles.categories.edit', compact('category', 'categoryCount'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Category $category)
  {
    $name = $request->input('name');
    $description = $request->input('description');
    $order = $request->input('order');

    // validate all input
    $request->validate([
      'name' => 'required|unique:App\Models\Category,name,' . $category->id,
      'description' => 'required|min:10',
      'order' => 'required|integer|min:1',
    ]);

    Category::where('id', $category->id)->update([
      'name' => $name,
      'description' => $description,
      'order' => $order
    ]);

    return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Category $category)
  {
    if ($category->articles->count() > 0) {
      return redirect()->back()->with('error', 'Category cannot be deleted because it has articles.');
    }

    $category->delete();
    return redirect()->back()->with('success', 'Category deleted successfully.');
  }
}
