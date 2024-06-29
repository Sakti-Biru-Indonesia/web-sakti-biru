@extends('layouts.dashboard')

@section('content')
<div class="row">
  <div class="card col-10 px-0">
    <div class="card-header">
      Create Product
    </div>
    <div class="card-body">
      <form action="{{ route('categories.store') }}" method="POST">
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
          <label for="inputCategoryDescription" class="">Category Description</label>
          <div class="mt-2">
            <textarea name="description" class="form-control"
              id="inputCategoryDescription">{{ old('description')  }}</textarea>
          </div>
          @if ($errors->has('description'))
          <span class="text-danger">{{ $errors->first('description') }}</span>
          @endif
        </div>

        <div class="mb-3">
          <label for="inputOrder" class="">Order</label>
          <div class="mt-2">
            <select name="order" class="form-select" aria-label="Order Category">
              <option value="0" selected>Open this select menu</option>
              @for ($i = 0; $i < $categoryCount; $i++) <option value="{{ $i + 1 }}" @if (old('order')==$i + 1) selected
                @endif>
                {{ $i + 1 }}
                </option>
                @endfor
                <option value="{{ $categoryCount + 1 }}">
                  {{ $categoryCount + 1 }}
                </option>
            </select>
          </div>
          @if ($errors->has('order'))
          <span class="text-danger">{{ $errors->first('order') }}</span>
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
