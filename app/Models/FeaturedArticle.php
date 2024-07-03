<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedArticle extends Model
{
  use HasFactory;

  protected $table = 'featured_articles';

  protected $fillable = ['article_id', 'category_id', 'order'];

  // has one on one with articles table
  public function article()
  {
    return $this->belongsTo(Article::class, 'article_id', 'id');
  }
}
