@extends('layouts.dashboard')

@section('title', 'Create User Profile')

@section('content')
<div class="container">

  @if (session()->has('success'))
  <div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>
  @endif

  @if (session()->has('error'))
  <div class="alert alert-danger" role="alert">
    {{ session('error') }}
  </div>
  @endif

  <div class="card shadow mb-4 profile-container">
    <div class="card-body">
      <div class="row">
        <div class="col-lg-4 text-center profile-picture">
          <img
            src="{{ $profile->image ? asset('storage/' . $profile->image) : asset('images/author-placeholder.png') }}"
            class="img-fluid rounded-circle mb-3" alt="Profile Image">
        </div>
        <div class="col-lg-8 profile-details">
          <h3>{{ Auth::user()->name }}</h3>
          <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
          <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
          <p><strong>Professional Title:</strong> {{ $profile->professional_title }}</p>
          <p><strong>Website:</strong>{{ $profile->website_url ?? '-' }}</a>
          </p>
          <p><strong>Facebook:</strong>{{ $profile->facebook_url ?? '-' }}</>
          </p>
          <p><strong>LinkedIn:</strong>{{ $profile->linkedin_url ?? '-' }}</>
          </p>
          <button class="btn btn-primary mt-3 btn-update-profile" data-toggle="modal"
            data-target="#updateProfileModal">Update Profile</button>
          <button class="btn btn-outline-primary mt-3 btn-change-password" data-toggle="modal" data-target="#changePasswordModal">Change Password</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Update Profile Modal -->
<div class="modal fade" id="updateProfileModal" tabindex="-1" role="dialog" aria-labelledby="updateProfileModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateProfileModalLabel">Update Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('user_profiles.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name"
              value="{{ old('name', Auth::user()->name ?? '') }}" required>
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
          </div>
          <div class="mb-3">
            <label for="professional_title" class="form-label">Professional Title</label>
            <input type="text" class="form-control" id="professional_title" name="professional_title"
              value="{{ old('professional_title', $profile->professional_title ?? '') }}" required>
            @if ($errors->has('professional_title'))
            <span class="text-danger">{{ $errors->first('professional_title') }}</span>
            @endif
          </div>
          <div class="mb-3">
            <label for="website_url" class="form-label">Website URL</label>
            <input type="url" class="form-control" id="website_url" name="website_url"
              value="{{ old('website_url', $profile->website_url ?? '') }}">
            @if ($errors->has('website_url'))
            <span class="text-danger">{{ $errors->first('website_url') }}</span>
            @endif
          </div>
          <div class="mb-3">
            <label for="facebook_url" class="form-label">Facebook URL</label>
            <input type="url" class="form-control" id="facebook_url" name="facebook_url"
              value="{{ old('facebook_url', $profile->facebook_url ?? '') }}">
            @if ($errors->has('facebook_url'))
            <span class="text-danger">{{ $errors->first('facebook_url') }}</span>
            @endif
          </div>
          <div class="mb-3">
            <label for="linkedin_url" class="form-label">LinkedIn URL</label>
            <input type="url" class="form-control" id="linkedin_url" name="linkedin_url"
              value="{{ old('linkedin_url', $profile->linkedin_url ?? '') }}">
            @if ($errors->has('linkedin_url'))
            <span class="text-danger">{{ $errors->first('linkedin_url') }}</span>
            @endif
          </div>
          <div class="mb-3">
            <label for="profile_image" class="form-label">Profile Image</label>
            <input type="file" class="form-control" id="profile_image" name="profile_image" accept="image/*">
            @if ($errors->has('profile_image'))
            <span class="text-danger">{{ $errors->first('profile_image') }}</span>
            @endif
          </div>
          <button type="submit" class="btn btn-primary">Save Profile</button>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- User Change Password Modal --}}
<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('password.update') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="current_password" class="form-label">Current Password</label>
            <input type="password" class="form-control" id="current_password" name="current_password" required>
            @if ($errors->has('current_password'))
            <span class="text-danger">{{ $errors->first('current_password') }}</span>
            @endif
          </div>
          <div class="mb-3">
            <label for="new_password" class="form-label">New Password</label>
            <input type="password" class="form-control" id="new_password" name="new_password" required>
            @if ($errors->has('new_password'))
            <span class="text-danger">{{ $errors->first('new_password') }}</span>
            @endif
          </div>
          <div class="mb-3">
            <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
          </div>
          <button type="submit" class="btn btn-primary">Change Password</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
