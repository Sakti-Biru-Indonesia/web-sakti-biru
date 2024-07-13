<nav class="navbar navbar-expand-lg fixed-top bg-white">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">
      <img src="{{ asset('images/SBI-logo.png') }}" alt="Sakti Biru Indonesia">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      {{-- <span class="navbar-toggler-icon"></span> --}}
      <i class="menu bi bi-list"></i>
      <i class="close bi bi-x-lg hide"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto">
        <a class="nav-link" href="{{ route('home') }}">Home</a>
        {{-- if in home page services have #service value in hyperlink --}}
        @if (Route::is('home'))
        <a class="nav-link" href="#services">Our Services</a>
        @else
        <a class="nav-link" href="{{ route('home', '#services') }}">Our Services</a>
        @endif
        <a class="nav-link" href="{{ route('products') }}">Products</a>
        <a class="nav-link" href="{{ route('blog-news') }}">Blog and News</a>
        <a class="nav-link" href="{{ route('contact') }}">Contacts</a>
        @include('components.internasionalization')
      </div>
    </div>
  </div>
</nav>
