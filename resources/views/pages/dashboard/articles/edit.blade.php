@extends('layouts.dashboard')

@section('content')
<div class="create-article-card card shadow mb-4">
  <div class="card-header py-3 d-flex align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">
      Edit Article
    </h6>
    @if ($featured)
    <form action="{{ route('featured-articles.destroy', $featured) }}" method="post">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger btn-sm">
        <i class="fas fa-minus"></i>
        Remove From Featured Articles
      </button>
    </form>
    @else
    <form action="{{ route('featured-articles.store') }}" method="post">
      @csrf
      @method('POST')
      <input type="hidden" name="article_id" value="{{ $id }}">
      <button type="submit" class="btn btn-primary btn-sm">
        <i class="fas fa-plus"></i>
        Add To Featured Articles
      </button>
    </form>
    @endif
  </div>

  <div class="card-body">
    {{-- Form To Edit Article --}}
    <form action="{{ route('dashboard.articles.update', $id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PATCH')

      @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
      @endif

      @if (session()->has('error'))
      <div class="alert alert-danger" role="alert">
        {{ session('error') }}
      </div>
      @endif

      {{-- Title --}}
      <div class="mb-3">
        <label for="inputTitle" class="form-label">
          Title
        </label>
        <input name="title" type="text" class="form-control" id="inputTitle" placeholder="ex: Making Sustainable Water"
          value="{{ old('title') ?? $articleTranslation->title }}">
        <span class="text-danger">
          @error('title')
          {{ $message }}
          @enderror
        </span>
      </div>

      {{-- Sub Headline --}}
      <div class=" mb-3">
        <label for="inputSubHeadline" class="form-label">
          Sub Headline
        </label>
        {{-- <input name="sub_headline" type="text" class="form-control" id="inputSubHeadline"
          placeholder="ex: Making Sustainable Water for Our Planet is Our Goal"> --}}
        <textarea name="sub_headline" class="form-control" id="inputSubHeadline" rows="3"
          placeholder="ex: Making Sustainable Water for Our Planet is Our Goal">{{ old('sub_headline') ?? $articleTranslation->sub_headline }}</textarea>

        <span class="text-danger">
          @error('sub_headline')
          {{ $message }}
          @enderror
        </span>
      </div>

      <div class="row">

        {{-- Image Banner --}}
        <div class="col-8 col-lg-4 mb-3">
          <label for="inputImage" class="form-label">
            Change Image Banner
          </label>
          <input name="image_banner" type="file" class="form-control" id="inputImage">
          <span class="text-danger">
            @error('image_banner')
            {{ $message }}
            @enderror
          </span>
        </div>

        {{-- Publish Date --}}
        <div class="col-8 col-lg-4 mb-3">
          <label for="inputPublishDate" class="form-label">
            Publish Date
          </label>
          <input name="publish_date" type="datetime-local" class="form-control" id="inputPublishDate"
            value="{{ old('publish_date') ?? $article->published_at }}">
          <span class="text-danger">
            @error('publish_date')
            {{ $message }}
            @enderror
          </span>
        </div>

        {{-- Set Publish Checkbox --}}
        <div class="form-floating col-8 col-lg-4 mb-3">
          <span class="text-danger">
            @error('publish_status')
            {{ $message }}
            @enderror
          </span>
          {{-- {{$article->is_published}} --}}
          <select class="form-select" id="floatingSelect" aria-label="Set Publish" name="publish_status">
            <option value="draft" @if ((old('publish_status')=='draft' or $article->is_published === 0)) selected
              @endif>Draft</option>
            <option value="publish" @if ((old('publish_status')=='publish' or $article->is_published === 1)) selected
              @endif>Publish</option>
          </select>
          <label for="floatingSelect" class="form-label">
            Publish Status
          </label>
        </div>

      </div>

      <div class="form-floating mb-3" style="max-width: 300px">
        <span class="text-danger">
          @error('category')
          {{ $message }}
          @enderror
        </span>
        <select class="form-select" id="floatingSelect" aria-label="Set Publish" name="category">
          <option>
            Choose Category
          </option>
          @foreach ($categories as $category)
          <option value="{{ $category->id }}" @if ((old('category') ?? $article->category_id)==$category->id) selected
            @endif>
            {{ $category->name }}
          </option>
          @endforeach
        </select>
        <label for="floatingSelect" class="form-label">
          Category
        </label>
      </div>

      <div class="mb-3">
        <label for="editor" class="form-label">
          Content
        </label>

        <br>
        <span class="text-danger">
          @error('content')
          {{ $message }}
          @enderror
        </span>
        <textarea id="editor" name="content"
          data-initial-value="{{$articleTranslation->content}}">{!! old('content') ?? $articleTranslation->content !!}</textarea>
      </div>

      <button type="submit" class="btn btn-primary">
        Submit
      </button>

    </form>
  </div>
</div>
@endsection

@section('custom-css-page-level')
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.css" />
@endsection

@section('page-level-addon')
<script type="importmap">
  {
      "imports": {
          "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.js",
          "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.0/"
      }
  }
</script>
<script src="{{ asset('js/dashboard/ckeditor.js') }}" type="module"></script>
@endsection
