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

      <a href="#" class="btn btn-primary">
        <i class="fas fa-plus"></i>
        Create Article
      </a>

    </div>
    <div class="card-body">
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
            <tr>
              <td class="number">1</td>
              <td class="title">
                Making a website with Laravel Without CSS Framework and Bootstrap 4 - Laravel
              </td>
              <td class="author">Otto</td>
              <td class="category">Laravel</td>
              <td class="status">
                {{-- <span class="badge badge-success">Published</span> --}}
                <span class="badge badge-secondary">Unpublished</span>
              </td>
              <td class="date">May 25th, 2024</td>
              <td class="action d-flex align-items-center border-0 h-100" style="column-gap: 4px">
                <a href="#" class="btn btn-warning btn-sm">
                  <i class="fas fa-pencil-alt"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm">
                  <i class="fas fa-trash"></i>
                </a>
              </td>
            </tr>


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
