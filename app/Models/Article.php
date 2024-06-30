<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
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

  public $locales = ['id', 'en'];

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

  public function insertArticle($user_id, $title, $sub_headline, $image,   $published_at, $is_published, $category_id, $content,)
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
      // $locales = $this->locales;

      foreach ($this->locales as $locale) {
        $articleTranslation->insertArticleTranslation(
          $article->id,
          $locale,
          $title,
          $sub_headline,
          $content
        );
      }

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

  public function updateArticle($id, $locale, $title, $sub_headline, $image, $published_at, $is_published, $category_id, $content)
  {
    DB::beginTransaction();

    try {

      $article = Article::find($id);

      // check if current user is the author of the article
      if ($article->user_id !== Auth::user()->id) {
        return [
          'status' => false,
          'message' => 'Cannot edit this article, you are not the author',
        ];
      }

      $article->update([
        'category_id' => $category_id,
        'is_published' => $is_published,
        'published_at' => $published_at,
      ]);

      // find translation
      $articleTranslation = $article->articleTranslation->where('locale', $locale)->where('article_id', $id)->first();

      if (!$articleTranslation) {
        // insert new translation
        $translationModel = new ArticleTranslation();
        $articleTranslation = $translationModel->insertArticleTranslation(
          $article->id,
          $locale,
          $title,
          $sub_headline,
          $content
        );
      } else {
        // update translation
        $articleTranslation->update([
          'title' => $title,
          'sub_headline' => $sub_headline,
          'content' => $content
        ]);
      }

      // store image to storage if image is uploaded
      if ($image) {
        $path = $image->storeAs('public/article', $image->hashName());
        $article->update([
          'image_banner_url' => $path
        ]);
      }

      DB::commit();

      return [
        'status' => true,
        'message' => 'Success Update Article',
        'data' => $article,
        'articleTranslation' => $articleTranslation
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
