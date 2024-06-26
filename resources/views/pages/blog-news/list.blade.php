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
    <a href="{{route('blog-news.details', 'test-item')}}" class="headline col-12 col-lg-6 d-flex flex-column">
      <img src="{{ asset('images/blog-thumbnail-template.png') }}" alt="first-item">
      <div class="headline-text d-flex flex-column">
        <h3 class="headline-title font-outfit fw-normal">
          SCI’s strategic recommendations for Indonesian shrimp industry challenges
        </h3>
        <p class="headline-description font-open-sans fw-normal">
          SCI emphasized two key issues during the meeting: a decline in shrimp production in 2023 and an ongoing
          trend
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
</section>

<section class="explore-news">
  <div class="row">

    {{-- Explore News List --}}
    <div class="explore-news-list col">

      {{-- Search Input Form --}}
      <form action="#" method="get" class="search-input-form">
        <div class="input-group position-relative">
          <input type="text" class="search-input form-control rounded-pill"
            placeholder="Find news, articles, or blog posts.." aria-label="search-input" aria-describedby="search">
          <button class="search-btn btn position-absolute" type="submit" id="search">
            <i class="bi bi-search"></i>
          </button>
        </div>
      </form>

      {{-- Explore News List Group --}}
      <div class="explore-news-group-list d-flex flex-column">

        {{-- Water Management --}}
        <div class="explore-news-list-group">
          <div class="explore-news-group-item">

            {{-- Explore News Group Header --}}
            <div class="explore-news-group-header d-flex flex-column">
              <h3 class="explore-news-group-header-title font-outfit font-medium">
                Water Management
              </h3>
              <p class="explore-news-group-header-description font-open-sans">
                Latest news on aquaculture genetics and discoveries
              </p>
            </div>

            {{-- Explore News Items --}}
            <div class="explore-news-items row">

              {{-- First Item --}}
              <div class="col-12 col-lg-5">
                <a href="#" class="explore-news-item first-item d-flex flex-column">
                  <img class="explore-news-item-image rounded " src="{{ asset('images/blog-thumbnail-template.png') }}"
                    alt="explore-news">
                  <div class="explore-news-text d-flex flex-column">
                    <p class="explore-news-item-title">
                      SCI’s strategic recommendations for Indonesian shrimp industry challenges
                    </p>
                    <span class="explore-news-item-date-author">
                      May 25th, 2024 - Robert Baratheon
                    </span>
                  </div>
                </a>
              </div>

              {{-- Second until Fourth Item --}}
              <div class="col-12 col-lg-7 beside-first-item d-flex flex-column">

                <a href="#" class="explore-news-item d-flex align-items-center">
                  <img class="explore-news-item-image rounded " src="{{ asset('images/blog-thumbnail-template.png') }}"
                    alt="explore-news">
                  <div class="explore-news-item">
                    <p class="explore-news-item-title">
                      Boeing’s first astronaut flight called off at the last minute in latest setback
                    </p>
                    <span class="explore-news-item-date-author">
                      May 25th, 2024 - Robert Baratheon
                    </span>
                  </div>
                </a>

                <a href="#" class="explore-news-item d-flex align-items-center">
                  <img class="explore-news-item-image rounded " src="{{ asset('images/blog-thumbnail-template.png') }}"
                    alt="explore-news">
                  <div class="explore-news-item">
                    <p class="explore-news-item-title">
                      Boeing’s first astronaut flight called off at the last minute in latest setback
                    </p>
                    <span class="explore-news-item-date-author">
                      May 25th, 2024 - Robert Baratheon
                    </span>
                  </div>
                </a>

                <a href="#" class="explore-news-item d-flex align-items-center">
                  <img class="explore-news-item-image rounded " src="{{ asset('images/blog-thumbnail-template.png') }}"
                    alt="explore-news">
                  <div class="explore-news-item">
                    <p class="explore-news-item-title">
                      Boeing’s first astronaut flight called off at the last minute in latest setback
                    </p>
                    <span class="explore-news-item-date-author">
                      May 25th, 2024 - Robert Baratheon
                    </span>
                  </div>
                </a>
              </div>

              {{-- Rest Items --}}
              <div class="rest-items col-12 d-flex flex-column">

                <a href="#" class="explore-news-item d-flex align-items-center">
                  <img class="explore-news-item-image rounded " src="{{ asset('images/blog-thumbnail-template.png') }}"
                    alt="explore-news">
                  <div class="explore-news-item">
                    <p class="explore-news-item-title">
                      Boeing’s first astronaut flight called off at the last minute in latest setback
                    </p>
                    <span class="explore-news-item-date-author">
                      May 25th, 2024 - Robert Baratheon
                    </span>
                  </div>
                </a>

                <a href="#" class="explore-news-item d-flex align-items-center">
                  <img class="explore-news-item-image rounded " src="{{ asset('images/blog-thumbnail-template.png') }}"
                    alt="explore-news">
                  <div class="explore-news-item">
                    <p class="explore-news-item-title">
                      Boeing’s first astronaut flight called off at the last minute in latest setback
                    </p>
                    <span class="explore-news-item-date-author">
                      May 25th, 2024 - Robert Baratheon
                    </span>
                  </div>
                </a>

              </div>
            </div>

            {{-- Explore News Group Footer --}}
            <div class="explore-news-group-footer">
              <a href="#"
                class="explore-news-group-footer-link font-outfit font-medium text-center d-flex justify-content-center align-items-center">
                View All <i class="fas fa-chevron-down"></i>
              </a>
            </div>
          </div>
        </div>

        {{-- Health Management --}}
        <div class="explore-news-list-group">
          <div class="explore-news-group-item">

            {{-- Explore News Group Header --}}
            <div class="explore-news-group-header d-flex flex-column">
              <h3 class="explore-news-group-header-title font-outfit font-medium">
                Health Management
              </h3>
              <p class="explore-news-group-header-description font-open-sans">
                Latest news on aquaculture genetics and discoveries
              </p>
            </div>

            {{-- Explore News Items --}}
            <div class="explore-news-items row">

              {{-- First Item --}}
              <div class="col-12 col-lg-5">
                <a href="#" class="explore-news-item first-item d-flex flex-column">
                  <img class="explore-news-item-image rounded " src="{{ asset('images/blog-thumbnail-template.png') }}"
                    alt="explore-news">
                  <div class="explore-news-text d-flex flex-column">
                    <p class="explore-news-item-title">
                      SCI’s strategic recommendations for Indonesian shrimp industry challenges
                    </p>
                    <span class="explore-news-item-date-author">
                      May 25th, 2024 - Robert Baratheon
                    </span>
                  </div>
                </a>
              </div>

              {{-- Second until Fourth Item --}}
              <div class="col-12 col-lg-7 beside-first-item d-flex flex-column">

                <a href="#" class="explore-news-item d-flex align-items-center">
                  <img class="explore-news-item-image rounded " src="{{ asset('images/blog-thumbnail-template.png') }}"
                    alt="explore-news">
                  <div class="explore-news-item">
                    <p class="explore-news-item-title">
                      Boeing’s first astronaut flight called off at the last minute in latest setback
                    </p>
                    <span class="explore-news-item-date-author">
                      May 25th, 2024 - Robert Baratheon
                    </span>
                  </div>
                </a>

                <a href="#" class="explore-news-item d-flex align-items-center">
                  <img class="explore-news-item-image rounded " src="{{ asset('images/blog-thumbnail-template.png') }}"
                    alt="explore-news">
                  <div class="explore-news-item">
                    <p class="explore-news-item-title">
                      Boeing’s first astronaut flight called off at the last minute in latest setback
                    </p>
                    <span class="explore-news-item-date-author">
                      May 25th, 2024 - Robert Baratheon
                    </span>
                  </div>
                </a>

                <a href="#" class="explore-news-item d-flex align-items-center">
                  <img class="explore-news-item-image rounded " src="{{ asset('images/blog-thumbnail-template.png') }}"
                    alt="explore-news">
                  <div class="explore-news-item">
                    <p class="explore-news-item-title">
                      Boeing’s first astronaut flight called off at the last minute in latest setback
                    </p>
                    <span class="explore-news-item-date-author">
                      May 25th, 2024 - Robert Baratheon
                    </span>
                  </div>
                </a>
              </div>

              {{-- Rest Items --}}
              <div class="rest-items col-12 d-flex flex-column">

                <a href="#" class="explore-news-item d-flex align-items-center">
                  <img class="explore-news-item-image rounded " src="{{ asset('images/blog-thumbnail-template.png') }}"
                    alt="explore-news">
                  <div class="explore-news-item">
                    <p class="explore-news-item-title">
                      Boeing’s first astronaut flight called off at the last minute in latest setback
                    </p>
                    <span class="explore-news-item-date-author">
                      May 25th, 2024 - Robert Baratheon
                    </span>
                  </div>
                </a>

                <a href="#" class="explore-news-item d-flex align-items-center">
                  <img class="explore-news-item-image rounded " src="{{ asset('images/blog-thumbnail-template.png') }}"
                    alt="explore-news">
                  <div class="explore-news-item">
                    <p class="explore-news-item-title">
                      Boeing’s first astronaut flight called off at the last minute in latest setback
                    </p>
                    <span class="explore-news-item-date-author">
                      May 25th, 2024 - Robert Baratheon
                    </span>
                  </div>
                </a>

              </div>
            </div>

            {{-- Explore News Group Footer --}}
            <div class="explore-news-group-footer">
              <a href="#"
                class="explore-news-group-footer-link font-outfit font-medium text-center d-flex justify-content-center align-items-center">
                View All <i class="fas fa-chevron-down"></i>
              </a>
            </div>
          </div>
        </div>

        {{-- Nutrition --}}
        <div class="explore-news-list-group">
          <div class="explore-news-group-item">

            {{-- Explore News Group Header --}}
            <div class="explore-news-group-header d-flex flex-column">
              <h3 class="explore-news-group-header-title font-outfit font-medium">
                Nutrition
              </h3>
              <p class="explore-news-group-header-description font-open-sans">
                Latest news on aquaculture genetics and discoveries
              </p>
            </div>

            {{-- Explore News Items --}}
            <div class="explore-news-items row">

              {{-- First Item --}}
              <div class="col-12 col-lg-5">
                <a href="#" class="explore-news-item first-item d-flex flex-column">
                  <img class="explore-news-item-image rounded " src="{{ asset('images/blog-thumbnail-template.png') }}"
                    alt="explore-news">
                  <div class="explore-news-text d-flex flex-column">
                    <p class="explore-news-item-title">
                      SCI’s strategic recommendations for Indonesian shrimp industry challenges
                    </p>
                    <span class="explore-news-item-date-author">
                      May 25th, 2024 - Robert Baratheon
                    </span>
                  </div>
                </a>
              </div>

              {{-- Second until Fourth Item --}}
              <div class="col-12 col-lg-7 beside-first-item d-flex flex-column">

                <a href="#" class="explore-news-item d-flex align-items-center">
                  <img class="explore-news-item-image rounded " src="{{ asset('images/blog-thumbnail-template.png') }}"
                    alt="explore-news">
                  <div class="explore-news-item">
                    <p class="explore-news-item-title">
                      Boeing’s first astronaut flight called off at the last minute in latest setback
                    </p>
                    <span class="explore-news-item-date-author">
                      May 25th, 2024 - Robert Baratheon
                    </span>
                  </div>
                </a>

                <a href="#" class="explore-news-item d-flex align-items-center">
                  <img class="explore-news-item-image rounded " src="{{ asset('images/blog-thumbnail-template.png') }}"
                    alt="explore-news">
                  <div class="explore-news-item">
                    <p class="explore-news-item-title">
                      Boeing’s first astronaut flight called off at the last minute in latest setback
                    </p>
                    <span class="explore-news-item-date-author">
                      May 25th, 2024 - Robert Baratheon
                    </span>
                  </div>
                </a>

                <a href="#" class="explore-news-item d-flex align-items-center">
                  <img class="explore-news-item-image rounded " src="{{ asset('images/blog-thumbnail-template.png') }}"
                    alt="explore-news">
                  <div class="explore-news-item">
                    <p class="explore-news-item-title">
                      Boeing’s first astronaut flight called off at the last minute in latest setback
                    </p>
                    <span class="explore-news-item-date-author">
                      May 25th, 2024 - Robert Baratheon
                    </span>
                  </div>
                </a>
              </div>

              {{-- Rest Items --}}
              <div class="rest-items col-12 d-flex flex-column">

                <a href="#" class="explore-news-item d-flex align-items-center">
                  <img class="explore-news-item-image rounded " src="{{ asset('images/blog-thumbnail-template.png') }}"
                    alt="explore-news">
                  <div class="explore-news-item">
                    <p class="explore-news-item-title">
                      Boeing’s first astronaut flight called off at the last minute in latest setback
                    </p>
                    <span class="explore-news-item-date-author">
                      May 25th, 2024 - Robert Baratheon
                    </span>
                  </div>
                </a>

                <a href="#" class="explore-news-item d-flex align-items-center">
                  <img class="explore-news-item-image rounded " src="{{ asset('images/blog-thumbnail-template.png') }}"
                    alt="explore-news">
                  <div class="explore-news-item">
                    <p class="explore-news-item-title">
                      Boeing’s first astronaut flight called off at the last minute in latest setback
                    </p>
                    <span class="explore-news-item-date-author">
                      May 25th, 2024 - Robert Baratheon
                    </span>
                  </div>
                </a>

              </div>
            </div>

            {{-- Explore News Group Footer --}}
            <div class="explore-news-group-footer">
              <a href="#"
                class="explore-news-group-footer-link font-outfit font-medium text-center d-flex justify-content-center align-items-center">
                View All <i class="fas fa-chevron-down"></i>
              </a>
            </div>
          </div>
        </div>

        {{-- Genetics --}}
        <div class="explore-news-list-group">
          <div class="explore-news-group-item">

            {{-- Explore News Group Header --}}
            <div class="explore-news-group-header d-flex flex-column">
              <h3 class="explore-news-group-header-title font-outfit font-medium">
                Genetics
              </h3>
              <p class="explore-news-group-header-description font-open-sans">
                Latest news on aquaculture genetics and discoveries
              </p>
            </div>

            {{-- Explore News Items --}}
            <div class="explore-news-items row">

              {{-- First Item --}}
              <div class="col-12 col-lg-5">
                <a href="#" class="explore-news-item first-item d-flex flex-column">
                  <img class="explore-news-item-image rounded " src="{{ asset('images/blog-thumbnail-template.png') }}"
                    alt="explore-news">
                  <div class="explore-news-text d-flex flex-column">
                    <p class="explore-news-item-title">
                      SCI’s strategic recommendations for Indonesian shrimp industry challenges
                    </p>
                    <span class="explore-news-item-date-author">
                      May 25th, 2024 - Robert Baratheon
                    </span>
                  </div>
                </a>
              </div>

              {{-- Second until Fourth Item --}}
              <div class="col-12 col-lg-7 beside-first-item d-flex flex-column">

                <a href="#" class="explore-news-item d-flex align-items-center">
                  <img class="explore-news-item-image rounded " src="{{ asset('images/blog-thumbnail-template.png') }}"
                    alt="explore-news">
                  <div class="explore-news-item">
                    <p class="explore-news-item-title">
                      Boeing’s first astronaut flight called off at the last minute in latest setback
                    </p>
                    <span class="explore-news-item-date-author">
                      May 25th, 2024 - Robert Baratheon
                    </span>
                  </div>
                </a>

                <a href="#" class="explore-news-item d-flex align-items-center">
                  <img class="explore-news-item-image rounded " src="{{ asset('images/blog-thumbnail-template.png') }}"
                    alt="explore-news">
                  <div class="explore-news-item">
                    <p class="explore-news-item-title">
                      Boeing’s first astronaut flight called off at the last minute in latest setback
                    </p>
                    <span class="explore-news-item-date-author">
                      May 25th, 2024 - Robert Baratheon
                    </span>
                  </div>
                </a>

                <a href="#" class="explore-news-item d-flex align-items-center">
                  <img class="explore-news-item-image rounded " src="{{ asset('images/blog-thumbnail-template.png') }}"
                    alt="explore-news">
                  <div class="explore-news-item">
                    <p class="explore-news-item-title">
                      Boeing’s first astronaut flight called off at the last minute in latest setback
                    </p>
                    <span class="explore-news-item-date-author">
                      May 25th, 2024 - Robert Baratheon
                    </span>
                  </div>
                </a>
              </div>

              {{-- Rest Items --}}
              <div class="rest-items col-12 d-flex flex-column">

                <a href="#" class="explore-news-item d-flex align-items-center">
                  <img class="explore-news-item-image rounded " src="{{ asset('images/blog-thumbnail-template.png') }}"
                    alt="explore-news">
                  <div class="explore-news-item">
                    <p class="explore-news-item-title">
                      Boeing’s first astronaut flight called off at the last minute in latest setback
                    </p>
                    <span class="explore-news-item-date-author">
                      May 25th, 2024 - Robert Baratheon
                    </span>
                  </div>
                </a>

                <a href="#" class="explore-news-item d-flex align-items-center">
                  <img class="explore-news-item-image rounded " src="{{ asset('images/blog-thumbnail-template.png') }}"
                    alt="explore-news">
                  <div class="explore-news-item">
                    <p class="explore-news-item-title">
                      Boeing’s first astronaut flight called off at the last minute in latest setback
                    </p>
                    <span class="explore-news-item-date-author">
                      May 25th, 2024 - Robert Baratheon
                    </span>
                  </div>
                </a>

              </div>
            </div>

            {{-- Explore News Group Footer --}}
            <div class="explore-news-group-footer">
              <a href="#"
                class="explore-news-group-footer-link font-outfit font-medium text-center d-flex justify-content-center align-items-center">
                View All <i class="fas fa-chevron-down"></i>
              </a>
            </div>
          </div>
        </div>

      </div>
    </div>

    {{-- Author List --}}
    <div class="author-list col d-flex flex-column align-items-end">
      <h3 class="author-list-header-title font-outfit font-medium">
        Our Writers
      </h3>
      <div class="author-list-wrapper d-flex flex-column">
        <a href="#" class="author-list-item d-flex align-items-center">
          <div class="author-list-item-text d-flex flex-column align-items-end">
            <p class="author-list-item-name font-outfit text-end font-medium">
              Justin Knoll
            </p>
            <span class="author-list-item-role font-outfit fw-normal text-end">
              Commodities Expert
            </span>
          </div>
          <img class="rounded-circle" src="{{ asset('images/author-placeholder.png') }}" alt="author">
        </a>
        <a href="#" class="author-list-item d-flex align-items-center">
          <div class="author-list-item-text d-flex flex-column align-items-end">
            <p class="author-list-item-name font-outfit text-end font-medium">
              Justin Knoll
            </p>
            <span class="author-list-item-role font-outfit fw-normal text-end">
              Commodities Expert
            </span>
          </div>
          <img class="rounded-circle" src="{{ asset('images/author-placeholder.png') }}" alt="author">
        </a>
        <a href="#" class="author-list-item d-flex align-items-center">
          <div class="author-list-item-text d-flex flex-column align-items-end">
            <p class="author-list-item-name font-outfit text-end font-medium">
              Justin Knoll
            </p>
            <span class="author-list-item-role font-outfit fw-normal text-end">
              Commodities Expert
            </span>
          </div>
          <img class="rounded-circle" src="{{ asset('images/author-placeholder.png') }}" alt="author">
        </a>
        <a href="#" class="author-list-item d-flex align-items-center">
          <div class="author-list-item-text d-flex flex-column align-items-end">
            <p class="author-list-item-name font-outfit text-end font-medium">
              Justin Knoll
            </p>
            <span class="author-list-item-role font-outfit fw-normal text-end">
              Commodities Expert
            </span>
          </div>
          <img class="rounded-circle" src="{{ asset('images/author-placeholder.png') }}" alt="author">
        </a>
      </div>
    </div>
  </div>
</section>

@endsection
