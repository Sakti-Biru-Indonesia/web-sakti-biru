<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard.home')}}">
    {{-- <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div> --}}
    <div class="sidebar-brand-text mx-3">
      Sakti Biru Indonesia
    </div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ request()->routeIs('dashboard.home') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('dashboard.home') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Home</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard.articles') }}">
      <i class="far fa-sticky-note"></i>
      <span>Articles</span></a>
  </li>

  <!-- Nav Item - Pages Collapse Menu -->
  @if (Auth::user()->role === 'ADMIN')
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
      aria-controls="collapsePages">
      <i class="fas fa-user"></i>
      <span>Users</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('dashboard.create.user') }}">Create User</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard.messages') }}">
      <i class="fas fa-fw fa-box"></i>
      <span>Messages</span>
    </a>
  </li>
  @endif

  <!-- Divider -->
  {{--
  <hr class="sidebar-divider d-none d-md-block"> --}}

  <!-- Sidebar Toggler (Sidebar) -->
  {{-- <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div> --}}

  <!-- Sidebar Message -->
  {{-- <div class="sidebar-card d-none d-lg-flex">
    <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
    <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!
    </p>
    <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
  </div> --}}

</ul>
