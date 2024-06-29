<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
  use HasFactory, Sluggable;

  protected $guarded = ['id'];

  protected $table = 'categories';

  protected $fillable = ['name', 'slug', 'description', 'order'];

  public function articles()
  {
    return $this->hasMany(Article::class);
  }

  public function createCategory($name)
  {
    $this::create([
      'name' => $name,
      'slug' => SlugService::createSlug(Category::class, 'slug', $name),
    ]);
  }

  public function sluggable(): array
  {
    return [
      'slug' => [
        'source' => 'name'
      ]
    ];
  }

  use HasFactory;
}
