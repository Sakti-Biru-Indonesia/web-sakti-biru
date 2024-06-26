<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
  protected $guarded = ['id'];

  protected $table = 'categories';

  protected $fillable = ['name', 'slug'];

  public function createCategory($name)
  {
    $this::create([
      'name' => $name,
      'slug' => Str::slug($name),
    ]);
  }

  use HasFactory;
}
