<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
  use HasFactory;

  protected $table = 'articles';

  // fillable
  protected $fillable = [
    'user_id',
    'category_id',
    'image_banner_url',
    'is_published',
    'published_at',
  ];

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id', 'id');
  }

  public function category()
  {
    return $this->belongsTo(Category::class, 'category_id', 'id');
  }

  public function articleTranslation()
  {
    return $this->hasMany(ArticleTranslation::class, 'article_id', 'id');
  }

  public function insertArticle($user_id, $locale, $title, $sub_headline, $image,   $published_at, $is_published, $category_id, $content,)
  {
    $articleTranslation = new ArticleTranslation();

    DB::beginTransaction();

    try {

      $article = Article::create([
        'user_id' => $user_id,
        'category_id' => $category_id,
        'is_published' => $is_published,
        'published_at' => $published_at,
      ]);

      // insert translation
      $articleTranslation->insertArticleTranslation(
        $article->id,
        $locale,
        $title,
        $sub_headline,
        $content
      );

      // store image to storage
      $path = $image->storeAs('public/article', $image->hashName());

      // update image url
      $article->update([
        'image_banner_url' => $path
      ]);

      DB::commit();

      return [
        'status' => true,
        'message' => 'Success Create Article',
        'data' => $article
      ];
    } catch (\Throwable $th) {
      DB::rollBack();
      return [
        'status' => false,
        'message' => $th->getMessage(),
      ];
    }
  }
}
