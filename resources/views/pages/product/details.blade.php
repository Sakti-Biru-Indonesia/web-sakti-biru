@extends('layouts.main')

@section('title')
Product Detail
@endsection

@section('content')
<section class="product-details mx-auto d-flex flex-column">

  {{-- Breadcrumb --}}
  <nav aria-label="breadcrumb" class="font-open-sans">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('products') }}">Products</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ $product->title }}</li>
    </ol>
  </nav>

  <div class="product-details-wrapper row">

    {{-- Product Images --}}
    <div class="product-images col d-flex flex-column">
      <div class="main-image">
        <img class="main-image-item"
          src="{{ asset($product->images->first()->url ?? 'images/product-placeholder.jpg') }}" alt="product">
      </div>

      <div class="other-images d-flex">
        @foreach ($product->images as $image)
        <img class="other-image-item" src="{{ asset($image->url) }}" alt="product"
          onclick="changeMainImage('{{ asset($image->url) }}')">
        @endforeach
      </div>
    </div>

    {{-- Product Details --}}
    <div class="product-details col d-flex flex-column">

      {{-- Header --}}
      <div class="header d-flex flex-column">
        <h1 class="title font-outfit">
          {{ $product->title }}
        </h1>
        <p class="category font-open-sans">
          {{ $product->category }}
        </p>
      </div>

      {{-- Details --}}
      <div class="details">
        <div class="accordion accordion-flush" id="product-details-desc-term">

          {{-- Details Description --}}
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Detail Produk
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne"
              data-bs-parent="#product-details-desc-term">
              <div class="accordion-body">
                <p>
                  {{ $product->detail_description }}
                </p>
              </div>
            </div>
          </div>

          {{-- Details Buy Term --}}
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Ketentuan Pembelian
              </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
              data-bs-parent="#product-details-desc-term">
              <div class="accordion-body">
                <p>
                  {{ $product->purchase_conditions }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- CTA --}}
      <div class="cta">
        <div class="price-contact d-flex justify-content-between border align-items-center">
          <div class="price d-flex flex-column flex-fill">
            <span class="title font-open-sans">Harga Produk</span>
            <span class="value font-outfit">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
          </div>
          <a href="{{$product->sales_contact}}" target="_blank" class="contact btn btn-wbi rounded-pill">
            Contact Sales
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  function changeMainImage(imageUrl) {
    document.querySelector('.main-image-item').src = imageUrl;
  }
</script>

@endsection
