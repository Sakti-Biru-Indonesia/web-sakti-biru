@extends('layouts.dashboard-non-navigation')

@section('content')
<div class="container" style="height: 88vh">
  <div class="row justify-content-center">
    <div class="col-md-9 col-lg-5">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row justify-content-center">
            {{-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> --}}
            <div class="col-lg-12">
              <div class="p-3 p-md-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                </div>

                @if (session()->has('error'))
                <div class="alert alert-danger" role="alert">
                  {{ session('error') }}
                </div>
                @endif

                <form class="user" action="{{ route('dashboard.signin') }}" method="POST">
                  @csrf
                  @method('POST')

                  <div class="form-group">
                    <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail"
                      aria-describedby="emailHelp" placeholder="Enter Email Address...">
                  </div>
                  <div class="form-group">
                    <input name="password" type="password" class="form-control form-control-user"
                      id="exampleInputPassword" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                      <input type="checkbox" name="remember" class="custom-control-input" id="customCheck">
                      <label class="custom-control-label" for="customCheck">Remember
                        Me</label>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Submit
                  </button>
                  {{--
                  <hr> --}}
                  {{-- <a href="index.html" class="btn btn-google btn-user btn-block">
                    <i class="fab fa-google fa-fw"></i> Login with Google
                  </a>
                  <a href="index.html" class="btn btn-facebook btn-user btn-block">
                    <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                  </a> --}}
                </form>
                {{--
                <hr>
                <div class="text-center">
                  <a class="small" href="forgot-password.html">Forgot Password?</a>
                </div>
                <div class="text-center">
                  <a class="small" href="register.html">Create an Account!</a>
                </div> --}}
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>
@endsection
