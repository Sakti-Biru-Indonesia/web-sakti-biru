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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $message)
                            <tr>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->phone_number }}</td>
                                <td>{{ $message->excerpt }}</td>
                                <td>
                                  <a href="{{ route('dashboard.show', $message->id) }}" class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $messages->links() }} <!-- Menampilkan link halaman pagination -->
        </div>
    </div>
@endsection
