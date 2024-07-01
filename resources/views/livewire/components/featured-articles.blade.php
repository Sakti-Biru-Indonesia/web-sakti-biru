<section class="featured-news">
  <div class="heading">
    <h2 class="fw-bold font-outfit">
      Featured News
    </h2>
  </div>
  <div class="blog-news row">
    <a href="{{route('blog-news.details', $featuredArticles[0]['slug'])}}"
      class="headline col-12 col-lg-6 d-flex flex-column">
      <img src="{{ asset($featuredArticles[0]['image_banner_url']) }}" alt="first-item">
      <div class="headline-text d-flex flex-column">
        <h3 class="headline-title font-outfit fw-normal">
          {{ $featuredArticles[0]['title'] }}
        </h3>
        <p class="headline-description font-open-sans fw-normal">
          {{ $featuredArticles[0]['sub_headline'] }}
        </p>
        <span class="headline-date-author font-open-sans fw-bold">
          {{ $featuredArticles[0]['publish_date'] }} - {{ $featuredArticles[0]['author'] }}
        </span>
      </div>
    </a>
    <div class="secondary-headline col-12 col-lg-6">
      <div class="secondary-news-blog-list d-flex flex-column">
        {{-- Loop and just take second to fourth --}}

        @foreach ($featuredArticles as $key => $article)
        @if ($key > 0 && $key < 4) <a href="{{route('blog-news.details', $article['slug'])}}"
          class="blog-news-item d-flex align-items-center">
          <img class="rounded" src="{{ asset($article['image_banner_url'] ?? 'images/product-placeholder.jpg') }}"
            alt="blog-news-item">
          <div class="blog-news-item-text">
            <h3 class="headline-title font-outfit fw-normal">
              {{ $article['title'] }}
            </h3>
            <span class="headline-date-author font-open-sans fw-normal">
              {{ $article['publish_date'] }} - {{ $article['author'] }}
            </span>
          </div>
          </a>
          @endif
          @endforeach

      </div>
      <div class="editor-pick d-flex flex-column">
        <h3 class="editor-pick-header-title font-outfit fw-normal">
          Editor's Pick
        </h3>
        <div class="editor-pick-list d-flex flex-column">

          {{-- Loop and just take fifth to seventh --}}
          @foreach ($featuredArticles as $key => $article)
          @if ($key > 3 && $key < 7) <a href="{{route('blog-news.details', $article['slug'])}}"
            class="editor-pick-item d-flex flex-column">
            <h4 class="editor-pick-title font-outfit fw-normal">
              {{ $article['title'] }}
            </h4>
            <span class="editor-pick-date-author font-open-sans fw-normal">
              {{ $article['publish_date'] }} - {{ $article['author'] }}
            </span>
            </a>
            @endif
            @endforeach

        </div>
      </div>
    </div>
  </div>
</section>
