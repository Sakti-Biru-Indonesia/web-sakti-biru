{{-- Don't show if empty --}}
<div class="explore-news-list-group">
  <div class="explore-news-group-item">

    {{-- Explore News Group Header --}}
    <div class="explore-news-group-header d-flex flex-column">
      <h3 class="explore-news-group-header-title font-outfit font-medium">
        {{$title}}
      </h3>
      <p class="explore-news-group-header-description font-open-sans">
        Latest news on aquaculture genetics and discoveries
      </p>
    </div>


    @if ($articles->count())
    {{-- Explore News Items --}}
    <div class="explore-news-items row">

      {{-- First Item --}}
      <div class="col-12 col-lg-5">
        <a href="{{route('blog-news.details', $articles[0]['slug'])}}"
          class="explore-news-item first-item d-flex flex-column">
          <img class="explore-news-item-image rounded " src="{{ asset($articles[0]['image_banner_url']) }}"
            alt="{{$articles[0]['title']}}">
          <div class="explore-news-text d-flex flex-column">
            <p class="explore-news-item-title">
              {{$articles[0]['title']}}
            </p>
            <span class="explore-news-item-date-author">
              {{$articles[0]['publish_date']}} - {{$articles[0]['author']}}
            </span>
          </div>
        </a>
      </div>

      {{-- Aside Items --}}
      @if ($asideArticles->count())
      <div class="col-12 col-lg-7 beside-first-item d-flex flex-column">

        @foreach ($asideArticles as $asideArticle)
        <a href="{{route('blog-news.details', $asideArticle['slug'])}}"
          class="explore-news-item d-flex align-items-center">
          <img class="explore-news-item-image rounded " src="{{ asset('images/blog-thumbnail-template.png') }}"
            alt="explore-news">
          <div class="explore-news-item">
            <p class="explore-news-item-title">
              {{$asideArticle['title']}}
            </p>
            <span class="explore-news-item-date-author">
              {{$asideArticle['publish_date']}} - {{$asideArticle['author']}}
            </span>
          </div>
        </a>
        @endforeach

      </div>
      @endif

      {{-- Rest Items --}}
      @if ($restArticles->count())
      <div class="rest-items col-12 d-flex flex-column">

        @foreach ($restArticles as $restArticle)
        <a href="{{route('blog-news.details', $restArticle['slug'])}}"
          class="explore-news-item d-flex align-items-center">
          <img class="explore-news-item-image rounded " src="{{ asset($restArticle['image_banner_url']) }}"
            alt="explore-news">
          <div class="explore-news-item">
            <p class="explore-news-item-title">
              {{$restArticle['title']}}
            </p>
            <span class="explore-news-item-date-author">
              {{$restArticle['publish_date']}} - {{$restArticle['author']}}
            </span>
          </div>
        </a>
        @endforeach

      </div>
      @endif
    </div>

    {{-- Explore News Group Footer --}}
    <div class="explore-news-group-footer">
      <a href="#"
        class="explore-news-group-footer-link font-outfit font-medium text-center d-flex justify-content-center align-items-center">
        View All <i class="fas fa-chevron-down"></i>
      </a>
    </div>

    @else

    <div class="row">
      <div class="col-12">
        <p class="explore-news-item-title font-outfit text-center" style="color: #80838d">
          There are no articles available
        </p>
      </div>
    </div>
    @endif
  </div>
</div>
