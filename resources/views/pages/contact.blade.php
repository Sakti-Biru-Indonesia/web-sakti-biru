@extends('layouts.main')

@section('title')
Contact Us
@endsection

@section('content')
<section class="contact row align-items-center">
  <form class="form d-flex flex-column p-0 font-outfit col-12 col-lg-6">
    <h2 class="font-medium">
      Still have some questions ? Reach out to us..
    </h2>
    <input type="text" placeholder="Name" class="form-control" id="name" aria-describedby="user-name">
    <input type="tel" placeholder="Phone Number" class="form-control" id="phone" aria-describedby="user-phone">
    <textarea name="message" class="form-control" placeholder="Your Message" id="message"></textarea>
    <button class="btn btn-primary rounded-pill btn-wbi align-self-end">
      Send
    </button>
  </form>
  <div class="img-wrapper col-12 col-lg-6 justify-content-end px-0">
    <img src="{{ asset('images/beach-contact.png') }}" alt="beach">
  </div>
</section>
@endsection
