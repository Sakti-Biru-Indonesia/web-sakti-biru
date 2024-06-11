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

@endsection
