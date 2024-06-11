@extends('layout')

@section('content')
{{-- Display Hero --}}
<section class="display-hero">
  <div class="content">
    <h1>
      <span>Indonesia’s</span> Trusted Partner
    </h1>
    <p>
      Lorem ipsum dolor sit amet consectetur. Tincidunt eleifend dignissim molestie fringilla lobortis
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
      Our Services
    </h2>
  </div>

  <div class="content mt-5">
    <div class="content-row row justify-content-between">
      <div class="service-item-wrapper col-12 col-md-12 col-lg-7 col-xl-6 flex-wrap row gap-4">
        <div
          class="service-item col-12 col-lg-6 border p-3  w-auto d-flex flex-column align-items-end justify-content-between">
          <img src="{{ asset('images/package.svg') }}" alt="Input & Technology Supplier">
          <p class="font-medium font-outfit m-0">
            Input & Technology Supplier
          </p>
        </div>
        <div
          class="service-item col-12 col-lg-6 border p-3  w-auto d-flex flex-column align-items-end justify-content-between">
          <img src="{{ asset('images/fishing-pole.svg') }}" alt="Input & Technology Supplier">
          <p class="font-medium font-outfit m-0">
            Farm Management
          </p>
        </div>
        <div
          class="service-item col-12 col-lg-6 border p-3  w-auto d-flex flex-column align-items-end justify-content-between">
          <img src="{{ asset('images/handshake.svg') }}" alt="Input & Technology Supplier">
          <p class="font-medium font-outfit m-0">
            Consultation
          </p>
        </div>
        <div
          class="service-item col-12 col-lg-6 border p-3  w-auto d-flex flex-column align-items-end justify-content-between">
          <img src="{{ asset('images/snowflake.svg') }}" alt="Input & Technology Supplier">
          <p class="font-medium font-outfit m-0">
            Cold Storage & Processing
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

@endsection
