@extends('layouts.dashboard')

@section('content')
<div class="category-list">

  <h1 class="h3 mb-2 text-gray-800">
    Categories
  </h1>
  <p class="mb-4">
    This is a list of categories
  </p>

  <a href="{{ route('categories.create') }}" class="btn btn-primary mb-4">
    Add New Category
  </a>

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
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Order</th>
              <th style="width: 110px">Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Order</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>

            @foreach ($categories as $category)

            <tr>
              <td class="number">
                {{ $loop->iteration }}
              </td>
              <td class="title">
                {{ $category->name }}
              </td>
              <td class="author">
                {{ $category->order }}
              </td>
              <td class="action d-flex align-items-center border-bottom-0 h-100" style="column-gap: 4px">
                <a href="{{route('categories.edit', $category->id)}}" class="btn btn-warning btn-sm">
                  <i class="fas fa-pencil-alt"></i>
                </a>
                <form action="{{route('categories.destroy', $category->id)}}" method="post">
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
