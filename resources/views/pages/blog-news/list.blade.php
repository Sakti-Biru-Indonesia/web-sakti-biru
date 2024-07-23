@extends('layouts.main')

@section('title')
Blog and News
@endsection

@section('content')

@if ($featuredArticleCount > 0)
<livewire:components.featured-articles />
@endif

<section class="explore-news">
  <div class="row">

    {{-- Explore News List --}}
    <div class="explore-news-list col">

      {{-- Search Input Form --}}
      <form action="{{ route('blog-news-search') }}" method="get" class="search-input-form">
        <div class="input-group position-relative">
          <input type="text" class="search-input form-control rounded-pill" name="query"
            placeholder="Find news, articles, or blog posts.." aria-label="search-input" aria-describedby="search">
          <button class="search-btn btn position-absolute" type="submit" id="search">
            <i class="bi bi-search"></i>
          </button>
        </div>
      </form>

      {{-- Explore News List Group --}}
      <div class="explore-news-group-list d-flex flex-column">

        {{-- Explore News List Group Items --}}

        @foreach ($categories as $category)

        {{--
        <livewire:explore-news-list-group-item :category="$category" /> --}}
        @livewire('explore-news-list-group-item', ['category' => $category], key($category['id']))
        @endforeach

      </div>
    </div>

    {{-- Author List --}}
    <div class="author-list col d-flex flex-column align-items-end">
      <h3 class="author-list-header-title font-outfit font-medium">
        Our Writers
      </h3>
      <div class="author-list-wrapper d-flex flex-column">

        @foreach ($users as $user)
        <a href="#" class="author-list-item d-flex align-items-center">
          <div class="author-list-item-text d-flex flex-column align-items-end">
            <p class="author-list-item-name font-outfit text-end font-medium">
              {{$user->name}}
            </p>
            <span class="author-list-item-role font-outfit fw-normal text-end">
              {{$user->profile->professional_title}}
            </span>
          </div>
          <img class="rounded-circle"
            src="{{ asset($user->profile->image ? str_replace('public','storage','storage/'.$user->profile->image) : 'images/author-placeholder.png') }}"
            alt="author">
        </a>
        @endforeach

      </div>
    </div>
  </div>
</section>

@endsection
