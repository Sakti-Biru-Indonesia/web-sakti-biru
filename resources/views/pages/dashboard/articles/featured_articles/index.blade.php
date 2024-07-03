@extends('layouts.dashboard')

@section('title', 'Featured Articles')

@section('content')
<div class="article-list">

  <h1 class="h3 mb-2 text-gray-800">
    Featured Articles
  </h1>
  <p class="mb-4">
    This is a list of featured articles
  </p>

  <div class="card shadow mb-4">
    <div class="card-body">
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
      <div class="article-list-table table-responsive">
        {{-- <form class="form-check form-switch mb-3">
          <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
          <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
        </form> --}}
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Title</th>
              <th>Author</th>
              <th>Category</th>
              <th>Status</th>
              <th>Publish Date</th>
              <th style="width: 110px">Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Title</th>
              <th>Author</th>
              <th>Category</th>
              <th>Status</th>
              <th>Publish Date</th>
              <th style="width: 110px">Action</th>
            </tr>
          </tfoot>
          <tbody>

            @foreach ($featuredArticles as $article)
            <tr>
              <td class="number">
                {{ $loop->iteration }}
              </td>
              <td class="title">
                {{ $article['title'] }}
              </td>
              <td class="author">
                {{ $article['author'] }}
              </td>
              <td class="author">
                {{ $article['category'] }}
              </td>
              <td class="author">
                @if ($article['status'])
                <span class="badge badge-success">Published</span>
                @else
                <span class="badge badge-secondary">Unpublished</span>
                @endif
              </td>
              <td class="author">
                {{ $article['publish_date'] }}
              </td>
              <td class="action d-flex align-items-center border-bottom-0 h-100" style="column-gap: 4px">
                <a href="{{route('featured-articles.edit', $article['featured_article'])}}"
                  class="btn btn-warning btn-sm">
                  <i class="fas fa-pencil-alt"></i>
                </a>
                <form action="{{route('featured-articles.destroy', $article['featured_article'])}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                    <i class="fas fa-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@section('page-level-addon')
<!-- Page level plugins -->
{{-- <script src="vendor/datatables/jquery.dataTables.min.js"></script> --}}
<script src="{{ asset('js/dashboard/vendor/datatables/jquery.dataTables.js') }}"></script>
{{-- <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script> --}}
<script src="{{ asset('js/dashboard/vendor/datatables/dataTables.bootstrap4.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/dashboard/datatables-demo.js') }}"></script>
@endsection
