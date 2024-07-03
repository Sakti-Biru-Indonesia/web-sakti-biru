<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
  use HasFactory;

  protected $fillable = ['product_id', 'url'];

  public function product()
  {
    return $this->belongsTo(Product::class);
  }

  public function deleteImage($path)
  {
    if (Storage::exists($path)) {
      Storage::delete(str_replace('storage', 'public', $path));
    }
  }
}
