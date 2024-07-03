@extends('layouts.dashboard')

@section('title', 'Edit Product')

@section('content')
<div class="row">
  <div class="card col-lg-10 px-0">
    <div class="card-header">
      Edit Product
    </div>
    <div class="card-body">
      <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
          {{ session('error') }}
        </div>
        @endif
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
        @endif

        <div class="mb-3">
          <label for="inputTitle">Title</label>
          <div class="mt-2">
            <input name="title" type="text" class="form-control" id="inputTitle"
              value="{{ $product->productDetail->where('locale', App::getLocale())->first()->name }}">
          </div>
          @error('title')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="mb-3">
          <label for="inputPrice">Price</label>
          <div class="mt-2">
            <input name="price" type="text" class="form-control" id="inputPrice"
              value="{{ old('price') ?? $product->price }}">
          </div>
          @error('price')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="mb-3">
          <label for="inputDetailDescription">Detail Description</label>
          <div class="mt-2">
            <textarea name="detail_description" class="form-control" id="inputDetailDescription"
              rows="5">{{ old('detail_description') ??  $product->productDetail->where('locale', App::getLocale())->first()->detail_description }}</textarea>
          </div>
          @error('detail_description')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="mb-3">
          <label for="inputPurchaseConditions">Purchase Conditions</label>
          <div class="mt-2">
            <textarea name="purchase_conditions" class="form-control" id="inputPurchaseConditions"
              rows="3">{{ old('purchase_conditions') ?? $product->productDetail->where('locale', App::getLocale())->first()->purchase_conditions }}</textarea>
          </div>
          @error('purchase_conditions')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="mb-3">
          <label for="inputSalesContact">Sales Contact</label>
          <div class="mt-2">
            <textarea name="sales_contact" class="form-control" id="inputSalesContact"
              rows="3">{{ old('sales_contact') ?? $product->sales_contact }}</textarea>
          </div>
          @error('sales_contact')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="mb-3">
          <label for="inputNewImages">Upload New Images</label>
          <input type="file" name="images[]" class="form-control-file" id="inputNewImages" multiple>
          @error('images')
          <span class="text-danger">{{ $message }}</span>
          @enderror
          @error('images.*')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <h3>Existing Images</h3>
        <div class="row mb-3">
          @foreach ($product->images as $image)
          <div class="col-md-3">
            <div class="card mb-3">
              <img src="{{ asset($image->url) }}" class="card-img-top" alt="Product Image">
              <div class="card-body">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="delete_images[]" value="{{ $image->id }}"
                    id="deleteImage{{ $image->id }}">
                  <label class="form-check-label" for="deleteImage{{ $image->id }}">
                    Delete
                  </label>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
        <a href="{{ route('products.show', $product->id) }}" class="btn btn-secondary ml-2">Cancel</a>
      </form>
    </div>
  </div>
</div>
@endsection
