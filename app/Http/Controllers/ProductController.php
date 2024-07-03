<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductImage;
use Exception;
use Illuminate\Support\Facades\DB;
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


    try {
      DB::beginTransaction();

      // $product = Product::create($request->except('images'));
      $product = new Product();

      $product = $product->insertProduct(
        $request->title,
        $request->price,
        $request->detail_description,
        $request->purchase_conditions,
        $request->sales_contact
      );

      if ($product['status'] == 'error') {
        throw new Exception($product['message']);
      }

      $product = $product['product'];

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

      DB::commit();
      return redirect()->route('products.index')->with('success', 'Product created successfully.');
    } catch (\Throwable $th) {

      DB::rollBack();
      $message = $th->getMessage() ?? "Something went wrong, please try again later.";
      return redirect()->back()->with('error', $message);
    }
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

    try {
      //code...


      $product = Product::findOrFail($id);
      $product = $product->updateProduct(
        $id,
        $request->title,
        $request->price,
        $request->detail_description,
        $request->purchase_conditions,
        $request->sales_contact
      );

      if (!$product['status']) {
        throw new Exception($product['message']);
      }

      $product = $product['product'];

      // Menghapus gambar yang dipilih
      if ($request->has('delete_images')) {
        foreach ($request->delete_images as $imageId) {
          $productImage = new ProductImage();
          $image = $productImage->findOrFail($imageId);
          Storage::delete(str_replace('storage', 'public', $image->url));
          $image->delete();
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
    } catch (\Throwable $th) {
      $message = "Something went wrong, please try again later.";
      return redirect()->back()->with('error', $message);
    }
  }

  public function destroy(Product $product)
  {
    $productId = $product->id;
    $product = $product->deleteProduct($productId);

    if (!$product['status']) {
      return redirect()->route('products.index')->with('error', 'Product failed to delete.');
    }

    return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
  }
}
