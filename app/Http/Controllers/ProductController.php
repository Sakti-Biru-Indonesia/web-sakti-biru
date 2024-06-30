<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

  public function list()
  {
    $products = Product::paginate(8);
    return view('pages.product.list', compact("products"));
  }

  public function details($slug)
  {
    $product = Product::where('id', $slug)->firstOrFail(); // Ambil detail produk berdasarkan slug

    return view('pages.product.details', compact('product'));
  }
  public function index()
  {
    $products = Product::all();
    return view('pages.dashboard.products.index', compact('products'));
  }

  public function create()
  {
    return view('pages.dashboard.products.create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required',
      'price' => 'required|numeric',
      'detail_description' => 'required',
      'purchase_conditions' => 'required',
      'sales_contact' => 'required|url',
      'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi untuk gambar
    ]);

    $product = Product::create($request->except('images'));

    if ($request->hasFile('images')) {
      foreach ($request->file('images') as $image) {
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/product_images', $imageName); // Simpan gambar di storage
        $imageUrl = 'storage/product_images/' . $imageName; // Path gambar untuk disimpan di database

        ProductImage::create([
          'product_id' => $product->id,
          'url' => $imageUrl
        ]);
      }
    }

    return redirect()->route('products.index')->with('success', 'Product created successfully.');
  }

  public function show(Product $product)
  {
    return view('pages.dashboard.products.show', compact('product'));
  }

  public function edit(Product $product)
  {
    return view('pages.dashboard.products.edit', compact('product'));
  }

  public function update(Request $request, $id)
  {
    // Validasi
    $request->validate([
      'title' => 'required',
      'price' => 'required|numeric',
      'detail_description' => 'required',
      'purchase_conditions' => 'required',
      'sales_contact' => 'required|url',
      'images' => 'nullable|array',
    ]);

    // Validasi untuk setiap gambar dalam array images
    if ($request->has('images')) {
      $request->validate([
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi untuk gambar
      ]);
    }

    $product = Product::findOrFail($id);
    $product->update($request->except('images', 'delete_images'));

    // Menghapus gambar yang dipilih
    if ($request->has('delete_images')) {
      foreach ($request->delete_images as $imageId) {
        $image = ProductImage::findOrFail($imageId);
        Storage::delete('public/product_images/' . basename($image->url)); // Hapus gambar dari storage
        $image->delete(); // Hapus data gambar dari database
      }
    }

    // Unggah gambar baru
    if ($request->hasFile('images')) {
      foreach ($request->file('images') as $image) {
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/product_images', $imageName); // Simpan gambar di storage
        $imageUrl = 'storage/product_images/' . $imageName; // Path gambar untuk disimpan di database

        ProductImage::create([
          'product_id' => $product->id,
          'url' => $imageUrl
        ]);
      }
    }

    return redirect()->route('products.index')->with('success', 'Product updated successfully.');
  }

  public function destroy(Product $product)
  {
    $product->delete();
    return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
  }
}
