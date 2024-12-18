@extends('layouts.main')

@section('title')
{{ $articleContent->title }} - Sakti Biru Indonesia
@endsection

@section('meta')

{{-- Meta --}}
<meta name="title" content="{{ $articleContent->meta_title ?? $articleContent->title }}">
<meta name="description" content="{{ $articleContent->meta_description ?? $articleContent->sub_headline }}">
<meta name="keywords" content="{{ $articleContent->meta_keywords }}">

{{-- Open Graph --}}
<meta property="og:title" content="{{  $articleContent->meta_title ?? $articleContent->title }}">
<meta property="og:description" content="{{ $articleContent->meta_description ?? $articleContent->sub_headline }}">
<meta property="og:image"
  content="{{  env('APP_URL') . asset(str_replace('public', 'storage',($article->image_banner_url))) }}">

{{-- Twitter Card --}}
<meta name="twitter:description" content="{{ $articleContent->meta_description ?? $articleContent->sub_headline }}">
<meta name="twitter:image"
  content="{{ env('APP_URL') . asset(str_replace('public', 'storage',($article->image_banner_url))) }}">

{{-- Robots --}}
<meta name="robots" content="index,follow">
@endsection


@section('content')
<section class="details-article d-flex flex-column mx-auto">
  <div class="header d-flex flex-column font-open-sans align-items-start">

    {{-- Breadcrumb --}}
    <div class="breadcrumb-wrapper">
      <ol class="breadcrumb font-open-sans">
        <li class="breadcrumb-item"><a href="{{ route('blog-news') }}">Blog and News</a></li>
        <li class="breadcrumb-item current-category">
          <a href="#">
            {{ $article->category->name }}
          </a>
        </li>
      </ol>
    </div>

    {{-- Title --}}
    <div class="title">
      <h1 class="font-outfit font-medium">
        {{ $articleContent->title }}
      </h1>
    </div>

    {{-- Abstract --}}
    <div class="abstract">
      <p class="fw-normal">
        {{ $articleContent->sub_headline }}
      </p>
    </div>

    {{-- Author and Publish Date --}}
    <div class="author-and-publish-date rounded-pill">
      <p>
        by <b>{{$user->name}}</b> • Published on <b>{{\Carbon\Carbon::parse($articleContent->published_at)->format('F j,
          Y')}}</b>
      </p>
    </div>
  </div>
  <div class="banner d-flex flex-column align-items-end">
    {{-- <img class="banner-image" src="{{ asset('images/blog-thumbnail-template.png') }}" alt="banner"> --}}
    <img class="banner-image" src="{{ asset(str_replace('public', 'storage',($article->image_banner_url))) }}"
      alt="{{$article->title}}">
    {{-- <span class="source">Source: {{}}</span> --}}
  </div>
  <div class="content row">
    <div class="content-body col d-flex flex-column">
      <div>
        {!!$articleContent->content!!}
      </div>
      <div class="back-to-top">
        <a href="#top">Back to Top</a>
      </div>
    </div>
    <div class="additional-info col d-flex flex-column align-items-end">

      {{-- Author Picture --}}
      {{-- <img class="author-picture rounded-circle" src="{{ asset('images/author-placeholder.png') }}" alt="author">
      --}}
      <img class="author-picture rounded-circle"
        src="{{ $user->profile->image ? asset('storage/' . $user->profile->image) : asset('images/author-placeholder.png') }}"
        alt="author">

      {{-- Author Info --}}
      <div class="author-info d-flex flex-column align-items-end">
        <p class="name font-outfit font-medium text-end">
          {{$user->name}}
        </p>
        <p class="role font-open-sans text-end">{{ $user->profile->professional_title }}</p>
      </div>

      {{-- Social Media Link --}}
      <div class="social-media d-flex justify-content-end align-items-center">

        @if ($user->profile->facebook_url)
        <a href="{{ $user->profile->facebook_url }}" target="_blank">
          <i class="bi bi-facebook"></i>
        </a>
        @endif

        @if ($user->profile->linkedin_url)
        <a href="{{ $user->profile->linkedin_url }}" target="_blank">
          <i class="bi bi-linkedin"></i>
        </a>
        @endif

        @if ($user->profile->website_url)
        <a href="{{ $user->profile->website_url }}" target="_blank">
          <i class="bi bi-globe"></i>
        </a>
        @endif
      </div>
    </div>
  </div>
</section>
@endsection
