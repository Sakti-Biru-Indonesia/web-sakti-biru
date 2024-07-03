@extends('layouts.main')

@section('title')
Product List
@endsection

@section('content')
<section class="product-list d-flex flex-column">

  {{-- Heading --}}
  <div class="heading-items d-flex flex-column align-items-center">
    <h2 class="fw-bold font-outfit">
      Our Products
    </h2>
    <form action="#" class="input-group position-relative ">
      <input type="text" class="form-control rounded-pill" placeholder="Explore our offerings.."
        aria-label="Explore our offerings.." aria-describedby="search-product">
      <button class="btn position-absolute" type="button" id="search-product">
        <i class="bi bi-search"></i>
      </button>
    </form>
  </div>

  {{-- Product List --}}
  <div class="product-list-wrapper row justify-content-center">

    {{-- Product Item --}}
    @foreach ($products as $product)
    <a href="{{ route('product.details', $product->id) }}" class="product-item col-5 col-md-3 d-flex flex-column">
      <img src="{{ asset($product->images->first()->url ?? 'images/product-placeholder.jpg') }}" alt="product">

      <div class="product-item-text font-outfit d-flex flex-column">
        <h3 class="font-medium">
          {{ $product->productDetail->where('locale', App::getLocale())->first()->name }}
        </h3>
        <p class="category font-open-sans">
          {{ $product->category }}
        </p>
        <p class="price font-medium">
          Rp {{ number_format($product->price, 0, ',', '.') }}
          {{-- {{ $product->price }} --}}
        </p>
      </div>
    </a>
    @endforeach
  </div>
  {{-- Pagination Links --}}
  <div class="d-flex justify-content-center">
    {{ $products->links('vendor.pagination.bootstrap-5') }}
  </div>
</section>
@endsection
