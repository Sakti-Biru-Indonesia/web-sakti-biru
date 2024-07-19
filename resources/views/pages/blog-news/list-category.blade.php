@extends('layouts.main')

@section('title')
{{ $category->name }} Articles - Sakti Biru
@endsection

@section('content')
<div class="list-article-by-category mx-auto">

  <form action="#" method="get" class="search-input-form">
    <div class="input-group position-relative">
      <input type="text" class="search-input form-control rounded-pill"
        placeholder="Find news, articles, or blog posts.." aria-label="search-input" aria-describedby="search">
      <button class="search-btn btn position-absolute" type="submit" id="search">
        <i class="bi bi-search"></i>
      </button>
    </div>
  </form>

  <div class="list-article-by-category-header d-flex align-items-center">
    <h2 class="font-outfit font-medium">
      All {{ $category->name }} News
    </h2>
  </div>

  <div class="articles col-12 d-flex flex-column mb-4">
    @foreach ($mappedArticles as $article)
    <a href="{{route('blog-news.details', $article['slug'])}}" class="news-item d-flex align-items-center">
      <img class="news-item-image rounded " src="{{ asset($article['image_banner_url']) }}" alt="explore-news">
      <div class="news-item-details d-flex flex-column">
        <p class="news-item-title">
          {{$article['title']}}
        </p>
        <p class="news-item-sub-headline">
          {{$article['sub_headline']}}
        </p>
        <span class="news-item-date-author">
          {{$article['publish_date']}} - {{$article['author']}}
        </span>
      </div>
    </a>
    @endforeach
  </div>

  {{ $articles->links() }}
</div>
@endsection
