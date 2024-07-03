@extends('layouts.dashboard')

@section('title', 'Products')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Products</h1>
<a href="{{ route('products.create') }}" class="btn btn-primary mb-4">Create New Product</a>

@if ($message = Session::get('success'))
<div class="alert alert-success">{{ $message }}</div>
@endif

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Products List</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Title</th>
            <th>Price</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $product)
          <tr>
            <td>{{ $product->productDetail->where('locale', App::getLocale())->first()->name }}</td>
            <td>{{ $product->price }}</td>
            <td>
              <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
              <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
              <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"
                  onclick="return confirm('Are you sure?')">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
