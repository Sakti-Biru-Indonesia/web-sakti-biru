<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleMetaContent extends Model
{
  protected $table = 'article_meta_contents';

  protected $fillable = [
    'article_id',
    'locale',
    'title',
    'description',
    'keywords',
  ];

  use HasFactory;

  public function article()
  {
    return $this->belongsTo(Article::class, 'article_id', 'id');
  }

  public function insertArticleMetaContent($article_id, $locale, $meta_title, $meta_description, $meta_keywords)
  {
    return ArticleMetaContent::create([
      'article_id' => $article_id,
      'locale' => $locale,
      'title' => $meta_title,
      'description' => $meta_description,
      'keywords' => $meta_keywords,
    ]);
  }
}
