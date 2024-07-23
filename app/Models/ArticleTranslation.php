<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleTranslation extends Model
{
  use HasFactory, Sluggable;

  protected $table = 'article_translations';

  // fillable
  protected $fillable = [
    'article_id',
    'locale',
    'slug',
    'title',
    'sub_headline',
    'content',
  ];

  public function article()
  {
    return $this->belongsTo(Article::class, 'article_id', 'id');
  }

  public function metaData()
  {
    return $this->belongsTo(Article::class, 'article_id', 'id');
  }


  public function insertArticleTranslation($article_id, $locale, $title, $sub_headline, $content)
  {
    return ArticleTranslation::create([
      'article_id' => $article_id,
      'locale' => $locale,
      'title' => $title,
      'slug' => SlugService::createSlug(ArticleTranslation::class, 'slug', $title),
      'sub_headline' => $sub_headline,
      'content' => $content,
    ]);
  }

  public function sluggable(): array
  {
    return [
      'slug' => [
        'source' => 'title'
      ]
    ];
  }
}
