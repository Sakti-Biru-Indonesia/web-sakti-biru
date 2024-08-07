@extends('layouts.main')

@section('title')
Search Articles - Sakti Biru
@endsection

@section('content')
<div class="list-article-by-category mx-auto">

  <form action="{{ route('blog-news-search') }}" method="get" class="search-input-form">
    <div class="input-group position-relative">
      @if ($category)
      <input type="hidden" name="category_id" value="{{ $category->id }}">
      @endif
      <input type="text" class="search-input form-control rounded-pill" name="query" value="{{ $query }}"
        placeholder="Find news, articles, or blog posts.." aria-label="search-input" aria-describedby="search">
      <button class="search-btn btn position-absolute" type="submit" id="search">
        <i class="bi bi-search"></i>
      </button>
    </div>
  </form>

  <div class="list-article-by-category-header d-flex align-items-center">
    <h2 class="font-outfit font-medium">
      Results for "{{ $query }}" {{$category ? 'in ' . $category->name : ''}}
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

    @if ($mappedArticles->count() == 0)
    <div class="article-not-found d-flex flex-column align-items-center">
      <h2 class="font-outfit font-medium text-muted">
        Articles Not Found
      </h2>
      <p class="font-outfit font-regular text-muted">
        We couldn't find any articles
      </p>
    </div>
    @endif

  </div>

  {{ $articles->links() }}
</div>
@endsection
