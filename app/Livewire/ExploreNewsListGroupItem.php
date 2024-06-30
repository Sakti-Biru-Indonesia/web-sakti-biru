<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\ArticleTranslation;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class ExploreNewsListGroupItem extends Component
{
  public $title;
  public $slug;
  public $locale;
  public $articles;
  public $asideArticles = [];
  public $restArticles = [];

  public function mount($category)
  {
    $this->title = $category->name;
    $this->slug = $category->slug;
    $this->locale = App::getLocale();

    // order by publish date
    $this->articles = Article::with(['articleTranslation'])
      ->where('category_id', $category->id)
      ->where('is_published', true)
      ->orderBy('published_at', 'desc')
      ->take(6)
      ->get()->map(function ($article) {
        return [
          'id' => $article->id,
          'title' => $article->articleTranslation->first()->title,
          'slug' => $article->articleTranslation->first()->slug,
          'image_banner_url' => str_replace('public', 'storage', $article->image_banner_url),
          'publish_date' => Carbon::parse($article->published_at)->format('F j, Y'),
          'author' => $article->user->name
        ];
      });

    $this->asideArticles = $this->articles->slice(1, 3);
    $this->restArticles = $this->articles->slice(4, 2);
  }

  public function render()
  {
    return view('livewire.components.explore-news-list-group-item');
  }
}
