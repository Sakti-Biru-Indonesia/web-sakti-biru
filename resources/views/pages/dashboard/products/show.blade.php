@extends('layouts.dashboard')

@section('title', 'View Product')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header">
                <h1 class="h3 mb-0 text-gray-800">{{ $product->title }}</h1>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="inputTitle" class="form-label">Title</label>
                    <input type="text" class="form-control" id="inputTitle" value="{{ $product->title }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="inputPrice" class="form-label">Price</label>
                    <input type="text" class="form-control" id="inputPrice" value="{{ $product->price }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="inputDetailDescription" class="form-label">Detail Description</label>
                    <textarea class="form-control" id="inputDetailDescription" rows="5" readonly>{{ $product->detail_description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="inputPurchaseConditions" class="form-label">Purchase Conditions</label>
                    <textarea class="form-control" id="inputPurchaseConditions" rows="3" readonly>{{ $product->purchase_conditions }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="inputSalesContact" class="form-label">Sales Contact</label>
                    <textarea class="form-control" id="inputSalesContact" rows="3" readonly>{{ $product->sales_contact }}</textarea>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit Product</a>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header">
                <h2 class="h4 mb-0 text-gray-800">Product Images</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($product->images as $image)
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img src="{{ asset($image->url) }}" alt="Product Image" class="card-img-top" style="width: 100%; height: auto;">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
