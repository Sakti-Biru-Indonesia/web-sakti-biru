@extends('layouts.dashboard')

@section('content')
    <h1>Message Details</h1>

    <div class="card">
        <div class="card-header">
            <h2>{{ $message->name }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Phone Number:</strong> {{ $message->phone_number }}</p>
            <p><strong>Message:</strong> {{ $message->message }}</p>
        </div>
    </div>

    <a href="{{ route('dashboard.messages') }}" class="btn btn-primary mt-3 mx-auto">Back to Messages</a>
@endsection
