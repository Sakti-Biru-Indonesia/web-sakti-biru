@extends('layouts.dashboard')

@section('title', 'Messages')

@section('content')
    <div class="card">
        <div class="card-header">Messages</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $message)
                            <tr>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->phone_number }}</td>
                                <td>{{ $message->message }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $messages->links() }} <!-- Menampilkan link halaman pagination -->
        </div>
    </div>
@endsection
