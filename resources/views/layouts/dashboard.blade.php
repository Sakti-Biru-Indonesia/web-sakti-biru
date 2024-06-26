<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard - Web Sakti Biru</title>

  <!-- Custom fonts for this template-->
  {{--
  <link href="/assets/css/dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> --}}
  <link href="{{ asset('css/dashboard/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

  <!-- Styles for this template-->
  <link href="{{ asset('/css/dashboard/sb-admin-2.min.css') }}" rel="stylesheet">

  <!-- Custom Styles for this template-->
  <link href="{{ asset('/css/custom-dashboard.css') }}" rel="stylesheet">

  {{-- Favicon --}}
  <link rel="shortcut icon" href="{{asset('images/SBI-logo.png')}}" type="image/x-icon">

  <!-- Custom styles for this page -->
  @yield('custom-css-page-level')

  {{-- Custom Scripts Preload --}}
  @yield('page-level-addon-preload')

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    @include('components.dashboard.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('components.dashboard.navbar-topbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          @yield('content')
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white mt-4">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Sakti Biru Indonesia</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  {{-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <form action="#" method="POST" data-confirm-delete="true">
            @csrf
            @method('POST')
            <button class="btn btn-primary" type="submit">Logout</a>
          </form>
        </div>
      </div>
    </div>
  </div> --}}

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('/js/dashboard/vendor/jquery.min.js') }}"></script>
  <script src="{{ asset('/js/dashboard/vendor/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('/js/dashboard/vendor/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('/js/dashboard/sb-admin-2.min.js') }}"></script>

  @yield('page-level-addon')

</body>

</html>
