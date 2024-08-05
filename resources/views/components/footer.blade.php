<footer>
  <div class="container">

    <div class="footer-content d-flex justify-content-between gap-4">

      {{-- Simple Description --}}
      <div class="simple-description">
        <img src="{{ asset('images/SBI-logo.png') }}" alt="logo-SBI">
        <p class="m-0 mt-3">
          SBI is a one-stop solution company in the shrimp aquaculture industry, member of Kedaulatan Pangan Pertiwi
          (KPP)
        </p>
      </div>

      {{-- Services --}}
      <div class="services">
        <h2>
          Sakti Biru Indonesia
        </h2>
        <div class="services-list d-flex flex-column mt-4">
          <a href="{{route('products')}}">Input and Technology Supplier</a>
          <a href="{{route('home', '#services')}}">Farm Management</a>
          <a href="{{route('home', '#services')}}">Consultation</a>
          <a href="{{route('home', '#services')}}">Cold Storage and Processing</a>
        </div>
      </div>

      {{-- Contacts --}}
      <div class="contact">
        <h2 class="">Our Contact</h2>
        <p>
          <b>SBI Office</b><br>
          Ruko City Park J12<br>
          Jl. Kapuk Kamal Raya<br>
          Jakarta, Indonesia
        </p>
        <div class="telp d-flex align-items-center gap-2 mt-2">
          <p>
            +62 819-1212-5758
          </p>
          <i class="fas fa-phone"></i>
        </div>
        <div class="social-media d-flex justify-content-between">
          <a href="#">
            <i class="bi bi-tiktok"></i>
          </a>
          <a href="#">
            <i class="bi bi-instagram"></i>
          </a>
          <a href="#">
            <i class="bi bi-facebook"></i>
          </a>
          <a href="#">
            <i class="bi bi-linkedin"></i>
          </a>
          <a href="#">
            <i class="bi bi-envelope"></i>
          </a>
        </div>
      </div>

    </div>

    {{-- Copyright Section --}}
    <div class="copyright d-flex justify-content-between align-items-center">
      <p class="copyright-text m-0">&copy; 2024 Sakti Biru Indonesia</p>
      <div class="other-list d-flex gap-4">
        <a href="#">Privacy Policy</a>
        <a href="#">Terms of Service</a>
        <a href="#">Created by Sakti Biru Indonesia</a>
      </div>
    </div>
  </div>
</footer>
