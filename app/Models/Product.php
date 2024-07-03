<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
  use HasFactory;

  protected $fillable = ['title', 'price', 'detail_description', 'purchase_conditions', 'sales_contact'];

  public function images()
  {
    return $this->hasMany(ProductImage::class);
  }

  public function productDetail()
  {
    return $this->hasMany(ProductDetail::class, 'product_id', 'id');
  }

  public function productImages()
  {
    return $this->hasMany(ProductImage::class, 'product_id', 'id');
  }

  // this method must return product object
  public function insertProduct($title, $price, $detail_description, $purchase_conditions, $sales_contact)
  {
    $locales = new Article();
    $locales = $locales->locales;

    DB::beginTransaction();

    try {

      $product = Product::create([
        'price' => $price,
        'sales_contact' => $sales_contact,
      ]);

      foreach ($locales as $locale) {
        ProductDetail::create([
          'product_id' => $product->id,
          'locale' => $locale,
          'name' => $title,
          'detail_description' => $detail_description,
          'purchase_conditions' => $purchase_conditions,
        ]);
      }

      DB::commit();

      return [
        'status' => 'success',
        'message' => 'Product created successfully',
        'product' => $product
      ];
    } catch (\Throwable $th) {

      DB::rollBack();
      return [
        'status' => 'error',
        'message' => $th->getMessage(),
      ];
    }
  }

  public function updateProduct($id, $title, $price, $detail_description, $purchase_conditions, $sales_contact)
  {

    DB::beginTransaction();
    $currentLocale = App::getLocale();

    try {
      $product = Product::find($id);
      $product->update([
        'price' => $price,
        'sales_contact' => $sales_contact,
      ]);

      ProductDetail::where('product_id', $id)->where('locale', $currentLocale)->update([
        'name' => $title,
        'detail_description' => $detail_description,
        'purchase_conditions' => $purchase_conditions,
      ]);

      DB::commit();

      return [
        'status' => true,
        'message' => 'Product updated successfully',
        'product' => $product
      ];
    } catch (\Throwable $th) {

      DB::rollBack();
      return [
        'status' => false,
        'message' => $th->getMessage(),
      ];
    }
  }

  public function deleteProduct($id)
  {
    DB::beginTransaction();

    try {

      $details = ProductDetail::where('product_id', $id)->get();
      $images = ProductImage::where('product_id', $id)->get();

      // delete product details
      foreach ($details as $detail) {
        $detail->delete();
      }

      // delete product images
      foreach ($images as $image) {
        $isExist = Storage::exists(str_replace('storage', 'public', $image->url));
        if (!$isExist) {
          continue;
        }
        Storage::delete(str_replace('storage', 'public', $image->url));
        $image->delete();
      }

      $product = Product::find($id);
      $product->delete();

      DB::commit();
      return [
        'status' => true,
        'message' => 'Product deleted successfully',
      ];
    } catch (\Throwable $th) {

      DB::rollBack();
      $message = $th->getMessage() ?? "Something went wrong, please try again later.";
      return [
        'status' => false,
        'message' => $message,
      ];
    }
  }
}
