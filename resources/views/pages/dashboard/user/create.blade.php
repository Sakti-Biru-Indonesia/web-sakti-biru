@extends('layouts.dashboard')

@section('content')
<div class="row">
  <div class="card col-5 px-0">
    <div class="card-header">
      Create User
    </div>
    <div class="card-body">
      <form action="{{ route('dashboard.admin-create.user') }}" method="POST">
        @csrf
        @method('POST')
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
          <label for="inputName" class="">Name</label>
          <div class="mt-2">
            <input name="name" type="text" class="form-control" id="inputName" value="{{ old('name') }}">
          </div>
          @if ($errors->has('name'))
          <span class="text-danger">{{ $errors->first('name') }}</span>
          @endif
        </div>
        <div class="mb-3">
          <label for="inputEmail" class="">Email</label>
          <div class="mt-2">
            <input name="email" type="email" class="form-control" id="inputEmail" value="{{ old('email') }}">
          </div>
          @if ($errors->has('email'))
          <span class="text-danger">{{ $errors->first('email') }}</span>
          @endif
        </div>
        <div class="mb-3">
          <label for="inputPassword" class="">Password</label>
          <div class="mt-2">
            <input name="password" type="password" class="form-control" id="inputPassword">
          </div>
          @if ($errors->has('password'))
          <span class="text-danger">{{ $errors->first('password') }}</span>
          @endif
        </div>
        <div class="mb-3">
          <label for="inputConfirmPassword" class="">Confirm Password</label>
          <div class="mt-2">
            <input name="confirm_password" type="password" class="form-control" id="inputConfirmPassword">
          </div>

          @if ($errors->has('confirm_password'))
          <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
          @endif
        </div>
        <button type="submit" class="btn btn-primary">
          Create
        </button>
      </form>
    </div>
  </div>
</div>
@endsection
