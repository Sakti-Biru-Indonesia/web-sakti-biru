@extends('layouts.main')

@section('content')
{{-- Display Hero --}}
<section class="display-hero">
  <div class="content">
    <h1>
      <span>Indonesia’s</span> Trusted Partner
    </h1>
    <p>
      {{ __('messages.welcome') }}
    </p>
    <button class="btn btn-primary rounded-pill py-3 px-4">
      Talk to Us
    </button>
  </div>
  <div class="graphics">
    <img class="bg-wave" src="{{ asset('images/background-wave.png') }}" alt="background-wave">
    <img class="sea" src="{{ asset('images/sea.jpg') }}" alt="sea">
    <img class="fishery" src="{{ asset('images/fishery.png') }}" alt="fishery">
    <img class="round-waves" src="{{ asset('images/ic_round-waves.svg') }}" alt="round-waves">
  </div>
</section>

{{-- Services --}}
<section class="services">
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
          Lorem ipsum dolor sit amet consectetur. Pretium massa libero habitant amet pretium morbi. Et vestibulum id at
          faucibus felis.
        </p>
      </div>
    </div>
  </div>
</section>

{{-- Blog and News --}}
<section class="blog-news">
  <div class="blog-news-wrapper row justify-content-between">
    <div class="blog-news-item-wrapper p-0 col-12 col-lg-6 col-xl-5 d-flex flex-column">
      <div class="blog-news-item d-flex gap-2 align-items-center">
        <img class="rounded" src="{{ asset('images/sea.jpg') }}" alt="blog-news">
        <div class="text-wrapper d-flex flex-column gap-1">
          <a href="#" class="title font-outfit">
            Boeing’s first astronaut flight called off at the last minute in latest setback
          </a>
          <span class="date-author font-open-sans">
            May 25th, 2024 - Justin Knoll
          </span>
        </div>
      </div>
      <div class="blog-news-item d-flex gap-2 align-items-center">
        <img class="rounded" src="{{ asset('images/sea.jpg') }}" alt="blog-news">
        <div class="text-wrapper d-flex flex-column gap-1">
          <a href="#" class="title font-outfit">
            Boeing’s first astronaut flight called off at the last minute in latest setback
          </a>
          <span class="date-author font-open-sans">
            May 25th, 2024 - Justin Knoll
          </span>
        </div>
      </div>
      <div class="blog-news-item d-flex gap-2 align-items-center">
        <img class="rounded" src="{{ asset('images/sea.jpg') }}" alt="blog-news">
        <div class="text-wrapper d-flex flex-column gap-1">
          <a href="#" class="title font-outfit">
            Boeing’s first astronaut flight called off at the last minute in latest setback
          </a>
          <span class="date-author font-open-sans">
            May 25th, 2024 - Justin Knoll
          </span>
        </div>
      </div>
    </div>

    <div
      class="text-content-wrapper font-outfit p-0 col-12 col-lg-6 col-xl-4 d-flex flex-column gap-3 align-items-end justify-content-center">
      <h2 class="font-medium text-end">
        {{ __('messages.expert_writers_leading_analysis') }}
      </h2>
      <p class="text-end">
        Lorem ipsum dolor sit amet consectetur. Tincidunt eleifend dignissim molestie fringilla lobortis
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
        Lorem ipsum dolor sit amet consectetur. Tincidunt eleifend dignissim molestie fringilla lobortis
      </p>
      <button class="btn btn-primary rounded-pill py-3 font-outfit font-medium">
        Explore
      </button>
    </div>

    <div class="product-preview col-12 col-xl-7">
      <img src="{{ asset('images/img-1.png') }}" alt="sea">
      <img src="{{ asset('images/img-2.png') }}" alt="sea">
      <img src="{{ asset('images/img-3.png') }}" alt="sea">
      <img src="{{ asset('images/img-4.png') }}" alt="sea">
    </div>
  </div>
</section>

{{-- Testimonial --}}
<section class="testimonial mx-auto d-flex flex-column">
  <div class="testimonial-item d-flex justify-content-between align-items-center">
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
      <img src="{{ asset('images/testimonial-1.png') }}" alt="testimonial">
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
      <img src="{{ asset('images/testimonial-1.png') }}" alt="testimonial">
    </div>
  </div>
</section>

{{-- Contact --}}
<section class="contact row align-items-center">
  <form class="form d-flex flex-column p-0 font-outfit col-12 col-lg-6">
    <h2 class="font-medium">
      {{ __('messages.still_have_questions_reach_out') }}
    </h2>
    <input type="text" placeholder="Name" class="form-control" id="name" aria-describedby="user-name">
    <input type="tel" placeholder="Phone Number" class="form-control" id="phone" aria-describedby="user-phone">
    <textarea name="message" class="form-control" placeholder="Your Message" id="message"></textarea>
    <button class="btn btn-primary rounded-pill btn-wbi align-self-end">
      Send
    </button>
  </form>
  <div class="img-wrapper col-12 col-lg-6 justify-content-end px-0">
    <img src="{{ asset('images/beach-contact.png') }}" alt="beach">
  </div>
</section>


@endsection
