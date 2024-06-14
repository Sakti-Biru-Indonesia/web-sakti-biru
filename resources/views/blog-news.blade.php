@extends('layouts.main')

@section('title')
Blog and News
@endsection

@section('content')
<section class="featured-news">
  <div class="heading">
    <h2 class="fw-bold font-outfit">
      Featured News
    </h2>
  </div>
  <div class="blog-news row">
    <a href="#" class="headline col-12 col-lg-6 d-flex flex-column">
      <img src="{{ asset('images/blog-thumbnail-template.png') }}" alt="first-item">
      <div class="headline-text d-flex flex-column">
        <h3 class="headline-title font-outfit fw-normal">
          SCI’s strategic recommendations for Indonesian shrimp industry challenges
        </h3>
        <p class="headline-description font-open-sans fw-normal">
          SCI emphasized two key issues during the meeting: a decline in shrimp production in 2023 and an ongoing trend
          of
          decreasing prices.
        </p>
        <span class="headline-date-author font-open-sans fw-bold">
          May 25th, 2024 - Robert Baratheon
        </span>
      </div>
    </a>
    <div class="secondary-headline col-12 col-lg-6">
      <div class="secondary-news-blog-list d-flex flex-column">
        <a href="#" class="blog-news-item d-flex align-items-center">
          <img class="rounded" src="{{ asset('images/blog-thumbnail-template.png') }}" alt="blog-news-item">
          <div class="blog-news-item-text">
            <h3 class="headline-title font-outfit fw-normal">
              Boeing’s first astronaut flight called off at the last minute in latest setback
            </h3>
            <span class="headline-date-author font-open-sans fw-normal">
              May 25th, 2024 - Justin Knoll
            </span>
          </div>
        </a>
        <a href="#" class="blog-news-item d-flex align-items-center">
          <img class="rounded" src="{{ asset('images/blog-thumbnail-template.png') }}" alt="blog-news-item">
          <div class="blog-news-item-text">
            <h3 class="headline-title font-outfit fw-normal">
              Boeing’s first astronaut flight called off at the last minute in latest setback
            </h3>
            <span class="headline-date-author font-open-sans fw-normal">
              May 25th, 2024 - Justin Knoll
            </span>
          </div>
        </a>
        <a href="#" class="blog-news-item d-flex align-items-center">
          <img class="rounded" src="{{ asset('images/blog-thumbnail-template.png') }}" alt="blog-news-item">
          <div class="blog-news-item-text">
            <h3 class="headline-title font-outfit fw-normal">
              Boeing’s first astronaut flight called off at the last minute in latest setback
            </h3>
            <span class="headline-date-author font-open-sans fw-normal">
              May 25th, 2024 - Justin Knoll
            </span>
          </div>
        </a>
      </div>
      <div class="editor-pick d-flex flex-column">
        <h3 class="editor-pick-header-title font-outfit fw-normal">
          Editor's Pick
        </h3>
        <div class="editor-pick-list d-flex flex-column">
          <a href="#" class="editor-pick-item d-flex flex-column">
            <h4 class="editor-pick-title font-outfit fw-normal">
              SCI’s strategic recommendations for Indonesian shrimp industry c...
            </h4>
            <span class="editor-pick-date-author font-open-sans fw-normal">
              May 25th, 2024 - Justin Knoll
            </span>
          </a>
          <a href="#" class="editor-pick-item d-flex flex-column">
            <h4 class="editor-pick-title font-outfit fw-normal">
              SCI’s strategic recommendations for Indonesian shrimp industry c...
            </h4>
            <span class="editor-pick-date-author font-open-sans fw-normal">
              May 25th, 2024 - Justin Knoll
            </span>
          </a>
          <a href="#" class="editor-pick-item d-flex flex-column">
            <h4 class="editor-pick-title font-outfit fw-normal">
              SCI’s strategic recommendations for Indonesian shrimp industry c...
            </h4>
            <span class="editor-pick-date-author font-open-sans fw-normal">
              May 25th, 2024 - Justin Knoll
            </span>
          </a>

        </div>
      </div>
    </div>
  </div>
  </div>
</section>
@endsection
