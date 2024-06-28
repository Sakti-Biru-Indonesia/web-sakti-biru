<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'price', 'detail_description', 'purchase_conditions', 'sales_contact'];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
