@extends('layouts.dashboard')

@section('content')
<div class="article-list">

  <h1 class="h3 mb-2 text-gray-800">
    Articles
  </h1>
  <p class="mb-4">
    This is a list of articles
  </p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">
        Articles List
      </h6>

      <a href="{{ route('dashboard.articles.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i>
        Create Article
      </a>

    </div>
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
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th class="title">Title</th>
              <th>Author</th>
              <th>Category</th>
              <th>Status</th>
              <th class="publish-date">Publish Date</th>
              <th>Action</th>
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
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach ($articlesList as $article)

            <tr>
              <td class="number">
                {{ $loop->iteration }}
              </td>
              <td class="title">{{ $article['title'] }}</td>
              <td class="author">{{ $article['user_name'] }}</td>
              <td class="category">{{$article['category']}}</td>
              <td class="status">
                @if ($article['status'])
                <span class="badge badge-success">Published</span>
                @else
                <span class="badge badge-secondary">Unpublished</span>
                @endif
              </td>
              <td class="date">
                {{ $article['publish_date'] ?? '-' }}
              </td>
              <td class="action d-flex align-items-center border-bottom-0 h-100" style="column-gap: 4px">
                <a href="{{ route('dashboard.articles.edit', $article['id']) }}" class="btn btn-warning btn-sm">
                  <i class="fas fa-pencil-alt"></i>
                </a>
                <form action="{{ route('dashboard.articles.destroy', $article['id']) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button href="#" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
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
