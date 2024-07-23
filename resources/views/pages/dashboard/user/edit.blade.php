@extends('layouts.dashboard')

@section('content')
<div class="row">
  <div class="card col-5 px-0">
    <div class="card-header">
      <h4><strong>Edit User:</strong> {{ $user->name }}</h4>
    </div>
    <div class="card-body">
      <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" class="form-control" required>
                <option value="ADMIN" {{ $user->role == 'ADMIN' ? 'selected' : '' }}>ADMIN</option>
                <option value="WRITER" {{ $user->role == 'WRITER' ? 'selected' : '' }}>WRITER</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
    </div>
  </div>
</div>
@endsection
