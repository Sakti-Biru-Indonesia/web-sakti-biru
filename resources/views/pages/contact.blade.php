@extends('layouts.main')

@section('title')
Contact Us
@endsection

@section('content')
<section class="contact row align-items-center">
  <form action="{{ route('send-message') }}" method="POST"
    class="form d-flex flex-column p-0 font-outfit col-12 col-lg-6">
    @csrf
    <h2 class="font-medium">Still have some questions? Reach out to us..</h2>

    <div class="">
      <div class="mt-2">
        <input type="text" name="name" placeholder="Name" class="form-control" id="name" value="{{ old('name') }}"
          required>
      </div>
      @error('name')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>

    <div class="">
      <div class="mt-2">
        <input type="text" name="phone_number" placeholder="Phone Number" class="form-control" id="phone"
          value="{{ old('phone_number') }}" required>
      </div>
      @error('phone_number')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>

    <div class="">
      <div class="mt-2">
        <textarea name="message" class="form-control" placeholder="Your Message" id="message"
          required>{{ old('message') }}</textarea>
      </div>
      @error('message')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary rounded-pill btn-wbi align-self-end">Send</button>
  </form>

  <div class="img-wrapper col-12 col-lg-6 justify-content-end px-0">
    <img src="{{ asset('images/fisherman.png') }}" alt="fisherman">
  </div>
</section>
@endsection
