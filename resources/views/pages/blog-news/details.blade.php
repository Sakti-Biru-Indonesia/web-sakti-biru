@extends('layouts.main')

@section('title')
Details
@endsection

@section('content')
<section class="details-article d-flex flex-column mx-auto">
  <div class="header d-flex flex-column font-open-sans">

    {{-- Breadcrumb --}}
    <div class="breadcrumb-wrapper">
      <ol class="breadcrumb font-open-sans">
        <li class="breadcrumb-item"><a href="{{ route('blog-news') }}">Blog and News</a></li>
        <li class="breadcrumb-item current-category"><a href="#">Genetics</a></li>
      </ol>
    </div>

    {{-- Title --}}
    <div class="title">
      <h1 class="font-outfit font-medium">
        SCI’s strategic recommendations for Indonesian shrimp industry challenges
      </h1>
    </div>

    {{-- Abstract --}}
    <div class="abstract">
      <p class="fw-normal">
        SCI emphasized two key issues during the meeting: a decline in shrimp production in 2023 and an ongoing trend of
        decreasing prices.
      </p>
    </div>

    {{-- Author and Publish Date --}}
    <div class="author-and-publish-date">
      <p>
        by <b>Robert Baratheon</b> • Published on <b>May 30th, 2024</b>
      </p>
    </div>
  </div>
  <div class="banner d-flex flex-column align-items-end">
    <img class="banner-image" src="{{ asset('images/blog-thumbnail-template.png') }}" alt="banner">
    <span class="source">Source: Lorem Ipsum</span>
  </div>
  <div class="content row">
    <div class="content-body col d-flex flex-column">
      {!!$bodyContent!!}
    </div>
    <div class="additional-info col d-flex flex-column align-items-end">

      {{-- Author Picture --}}
      <img class="author-picture rounded-circle" src="{{ asset('images/author-placeholder.png') }}" alt="author">

      {{-- Author Info --}}
      <div class="author-info d-flex flex-column align-items-end">
        <p class="name font-outfit font-medium text-end">Robert Baratheon</p>
        <p class="role font-open-sans text-end">Aquaculture Expert, for University of Manchester</p>
      </div>

      {{-- Social Media Link --}}
      <div class="social-media d-flex justify-content-end align-items-center">
        <a href="#">
          <i class="bi bi-facebook"></i>
        </a>
        <a href="#">
          <i class="bi bi-linkedin"></i>
        </a>
        <a href="#">
          <i class="bi bi-globe"></i>
        </a>
      </div>
    </div>
  </div>
</section>
@endsection
