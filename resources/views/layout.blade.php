<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    @yield('title', 'Sakti Biru Indonesia')
  </title>

  {{-- Bootstrap CSS --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  {{-- Custom CSS --}}
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

  {{-- Font --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
</head>

<body>

  @include('components.navbar')

  <div class="content-wrapper container">
    @yield('content')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
  </script>

  <script>
    const contentWrapper = document.querySelector('.content-wrapper');
    const navbar = document.querySelector('nav.navbar');

    const navbarBtn = navbar.querySelector('button.navbar-toggler');
    const menuBtnIcon = navbarBtn.querySelector('i.menu');
    const closeBtnIcon = navbarBtn.querySelector('i.close');

    contentWrapper.style.paddingTop = navbar.offsetHeight + 'px';

    navbarBtn.addEventListener('click', () => {
      menuBtnIcon.classList.toggle('hide');
      closeBtnIcon.classList.toggle('hide');
    });

  </script>
  @yield('script')
</body>

</html>
