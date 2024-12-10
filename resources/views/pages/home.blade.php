@extends('layouts.main')

@section('content')
{{-- Display Hero --}}
<section class="display-hero">
  <div class="content">
    <h1>
      {{-- <span>Indonesia’s</span> Trusted Partner --}}
      {{-- {{ __('messages.heading_hero') }} --}}
      <b>One-Stop Solution</b> for Your Shrimp Aquaculture
    </h1>
    {{-- <p>
      {{ __('messages.welcome') }}
    </p> --}}
    <a href="{{route('contact')}}" class="btn btn-wbi btn-primary rounded-pill py-3 px-4">
      Talk to Us
    </a>
  </div>
  <div class="graphics">
    <img class="hero-art" src="{{ asset('images/hero-art.jpg') }}" alt="hero art">
    {{-- <img class="bg-wave" src="{{ asset('images/background-wave.png') }}" alt="background-wave"> --}}
    {{-- <img class="sea" src="{{ asset('images/sea.jpg') }}" alt="sea">
    <img class="fishery" src="{{ asset('images/fishery.png') }}" alt="fishery">
    <img class="round-waves" src="{{ asset('images/ic_round-waves.svg') }}" alt="round-waves"> --}}
  </div>
</section>

{{-- Opening --}}
<section class="opening d-flex flex-column align-items-center">
  <img src="{{ asset('images/wave-asset.png') }}" alt="wave" class="rounded-pill">
  <div class="text-content font-outfit text-center">
    {{-- <p>We bring you the most reliable <b>aquaculture services</b> in Indonesia</p> --}}
    <p>
      Empowering shrimp farmers for <b>sustainable</b> aquaculture and a <b>resilient</b> blue economy
    </p>
  </div>
</section>

{{-- Presentation --}}
<section class="presentation d-flex justify-content-between align-items-center">
  <img src="{{ asset('images/fishpond.png') }}" alt="fishpond">
  <div class="text-content font-outfit position-relative d-flex flex-column">
    <h2>
      Transforming a Trusted Legacy,
    </h2>
    <p class="">
      With our extensive experience and expertise in the shrimp industry, we bring an innovative approach to provide
      comprehensive solutions for your shrimp farming.
    </p>
    <img src="{{ asset('images/ic_round-waves.svg') }}" alt="wave" class="wave position-absolute">
  </div>
</section>

{{-- Testimonies --}}
<section class="testimonies d-flex flex-column align-items-center">
  <div class="header d-flex flex-column">
    <p class="description font-outfit text-center">
      With an extensive network, <b>we collaborate with key partners</b> to deliver the best products and services,
      <b>enhancing
        the effectiveness and efficiency</b> of farming practices
    </p>

    <img src="{{ asset('images/wave-asset.png') }}" alt="wave" class="wave rounded-pill">
  </div>

  <div class="trusted-brands d-flex flex-column">
    <p class="font-outfit text-center font-medium">
      Trusted by
    </p>
    <div class="companies d-flex justify-content-center align-items-center flex-wrap">
      <img src="{{ asset('images/brands/all-fish-news.png') }}" alt="all-fish-news">
      <img src="{{ asset('images/brands/biomed.png') }}" alt="biomed">
      <img src="{{ asset('images/brands/mitra-SBI.png') }}" alt="mitra-SBI">
      <img src="{{ asset('images/brands/produk-SBI.png') }}" alt="produk-SBI">
    </div>
  </div>
</section>

{{-- Services --}}
<section class="services" id="services">
  <div class="heading">
    <h2 class="font-medium font-outfit">
      {{ __('messages.our_services') }}
    </h2>
  </div>

  <div class="content mt-5">
    <div class="content-row row justify-content-between">
      <div class="service-item-wrapper col-12 col-md-12 col-lg-7 col-xl-6 flex-wrap row gap-4">
        <div
          class="service-item col-12 col-lg-6 border p-3  w-auto d-flex flex-column align-items-end justify-content-between">
          <img src="{{ asset('images/package.svg') }}" alt="Input & Technology Supplier">
          <p class="font-medium font-outfit m-0">
            {{ __('messages.input_technology_supplier') }}
          </p>
        </div>
        <div
          class="service-item col-12 col-lg-6 border p-3  w-auto d-flex flex-column align-items-end justify-content-between">
          <img src="{{ asset('images/fishing-pole.svg') }}" alt="Input & Technology Supplier">
          <p class="font-medium font-outfit m-0">
            {{ __('messages.farm_management') }}
          </p>
        </div>
        <div
          class="service-item col-12 col-lg-6 border p-3  w-auto d-flex flex-column align-items-end justify-content-between">
          <img src="{{ asset('images/handshake.svg') }}" alt="Input & Technology Supplier">
          <p class="font-medium font-outfit m-0">
            {{ __('messages.consultation') }}
          </p>
        </div>
        <div
          class="service-item col-12 col-lg-6 border p-3  w-auto d-flex flex-column align-items-end justify-content-between">
          <img src="{{ asset('images/snowflake.svg') }}" alt="Input & Technology Supplier">
          <p class="font-medium font-outfit m-0">
            {{ __('messages.cold_storage_processing') }}
          </p>
        </div>
      </div>
      <div class="image-description col-12 col-md-12 col-lg-4 d-flex flex-column align-items-center">
        <img src="{{ asset('images/fish-pool.png') }}" alt="fish-pool">
        <p class="font-open-sans fw-normal text-center">
          We provide everything from cutting-edge technology to professional consultation optimizing your productivity
          and profitability.
        </p>
      </div>
    </div>
  </div>
</section>

{{-- Blog and News --}}
<section class="blog-news">

  {{-- Blog and News Wrapper --}}
  <div class="blog-news-wrapper row justify-content-between">
    <div class="blog-news-item-wrapper p-0 col-12 col-lg-6 col-xl-5 d-flex flex-column justify-content-center">

      @foreach ($articles as $article)
      {{-- Blog and News Item --}}
      <div class="blog-news-item d-flex gap-2 align-items-center">
        <img class="rounded" src="{{ asset($article['image_banner_url']) }}" alt="blog-news">
        <div class="text-wrapper d-flex flex-column gap-1">
          <a href="{{route('blog-news.details', $article['slug'])}}" class="title font-outfit">
            {{ $article['title'] }}
          </a>
          <span class="date-author font-open-sans">
            {{ $article['publish_date'] }} - {{ $article['author'] }}
          </span>
        </div>
      </div>
      @endforeach

    </div>

    <div
      class="text-content-wrapper font-outfit p-0 col-12 col-lg-6  d-flex flex-column gap-3 align-items-end justify-content-center">
      <h2 class="font-medium text-end">
        {{ __('messages.expert_writers_leading_analysis') }}
      </h2>
      <p class="text-end">
        Offering comprehensive insights into shrimp farming, covering all aspects such as genetics, nutrition, health,
        water quality, market trends, technology, and construction
      </p>
      <button class="btn btn-primary rounded-pill py-3">
        Read Articles
      </button>
    </div>
  </div>
</section>

{{-- Product --}}
<section class="product">
  <div class="content-wrapper row justify-content-between justify-content-lg-center justify-content-xl-between">
    <div class="text-content col-12 col-xl-5 d-flex flex-column gap-3 align-items-start">
      <h2 class="font-medium font-outfit font-medium m-0">
        {{ __('messages.world_leading_aquaculture_products') }}
      </h2>
      <p class="font-outfit m-0">
        We offer a comprehensive range of products. From high-quality shrimp larvae and nutritious feed to probiotics,
        aerators, and autofeeders, we provide everything you need to ensure healthy growth and maximum yield
      </p>
      <button class="btn btn-primary rounded-pill py-3 font-outfit font-medium">
        Explore
      </button>
    </div>

    <div class="product-preview col-12 col-xl-7">
      <img src="{{ asset('images/feed.png') }}" alt="sea">
      <img src="{{ asset('images/PCR.png') }}" alt="sea">
      <img src="{{ asset('images/post-larvae.png') }}" alt="sea">
      <img src="{{ asset('images/aerators.png') }}" alt="sea">
    </div>
  </div>
</section>

{{-- Testimonial --}}
{{-- <section class="testimonial mx-auto d-flex flex-column">
  <div class="testimonial-item d-flex justify-content-between align-items-center">
    <div class="text-quote d-flex">
      <i class="bi bi-quote"></i>
      <div class="text-content d-flex flex-column">
        <h2 class="font-outfit">
          Lorem ipsum dolor sit amet consectetur. Tincidunt eleifend..
        </h2>
        <p class="font-open-sans">
          <span>John Doe,</span> VP of Sales for Green Initiative Indonesia
        </p>
      </div>
    </div>
    <div class="img-wrapper">
      <img src="{{ asset('images/user-1.png') }}" alt="testimonial">
    </div>
  </div>

  <div class="testimonial-item reverse d-flex justify-content-between align-items-center">
    <div class="text-quote d-flex">
      <i class="bi bi-quote"></i>
      <div class="text-content d-flex flex-column">
        <h2 class="font-outfit">
          Lorem ipsum dolor sit amet consectetur. Tincidunt eleifend..
        </h2>
        <p class="font-open-sans">
          <span>Jane Doe,</span> VP of Sales for Green Initiative Indonesia
        </p>
      </div>
    </div>
    <div class="img-wrapper">
      <img src="{{ asset('images/user-2.png') }}" alt="testimonial">
    </div>
  </div>
</section> --}}

{{-- Contact --}}

<section class="contact row align-items-center">
  <form action="{{ route('send-message') }}" method="POST"
    class="form d-flex flex-column p-0 font-outfit col-12 col-lg-6">
    @csrf
    <h2 class="font-medium">Still have some questions? Reach out to us..</h2>

    <div class="">
      <div class="mt-2">
        <input type="text" name="name" placeholder="Name" class="form-control" id="name" value="{{ old('name') }}"
          required>
      </div>
      @error('name')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>

    <div class="">
      <div class="mt-2">
        <input type="text" name="phone_number" placeholder="Phone Number" class="form-control" id="phone"
          value="{{ old('phone_number') }}" required>
      </div>
      @error('phone_number')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>

    <div class="">
      <div class="mt-2">
        <textarea name="message" class="form-control" placeholder="Your Message" id="message"
          required>{{ old('message') }}</textarea>
      </div>
      @error('message')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary rounded-pill btn-wbi align-self-end">Send</button>
  </form>

  <div class="img-wrapper col-12 col-lg-6 justify-content-end px-0">
    <img src="{{ asset('images/fisherman.png') }}" alt="fisherman">
  </div>
</section>



@endsection
