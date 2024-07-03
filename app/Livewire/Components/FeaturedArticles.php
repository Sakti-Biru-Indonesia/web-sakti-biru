<?php

namespace App\Livewire\Components;

use App\Models\FeaturedArticle;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class FeaturedArticles extends Component
{
  public $featuredArticles;

  public function mount()
  {
    // take 7 featured articles
    $featuredArticles = FeaturedArticle::take(7)->where('category_id', null)->get();
    $locale = App::getLocale();

    // map featured articles to get article and article translation
    $featuredArticles = $featuredArticles->map(function ($featuredArticle) use ($locale) {
      $article = $featuredArticle->article;
      $articleTranslation = $article->articleTranslation;

      return [
        'title' => $articleTranslation->where('locale', $locale)->first()->title,
        'slug' => $articleTranslation->where('locale', $locale)->first()->slug,
        'author' => $article->user->name,
        'image_banner_url' => str_replace('public', 'storage', $article->image_banner_url),
        'publish_date' => Carbon::parse($article->published_at)->locale($locale)->format('F j, Y'),
        'sub_headline' => $this->truncateString($articleTranslation->where('locale', $locale)->first()->sub_headline),
      ];
    });

    $this->featuredArticles = $featuredArticles;
  }

  public function render()
  {
    return view('livewire.components.featured-articles');
  }

  public function truncateString($string, $maxLength = 131, $end = '...')
  {
    if (mb_strlen($string) > $maxLength) {
      return mb_strimwidth($string, 0, $maxLength - mb_strlen($end)) . $end;
    }
    return $string;
  }
}
