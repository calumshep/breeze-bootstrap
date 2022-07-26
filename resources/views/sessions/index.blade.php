@extends('layouts.app')

@section('content')

    <div class="d-md-flex justify-content-between align-items-baseline mb-3">
        <h1>Sessions Admin</h1>
        <a href="{{ route('sessions.create') }}" class="btn btn-primary">New session</a>
    </div>

    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status')  }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Time</th>
                <th>Name</th>
                <th>Cost</th>
                <th>Current Bookings</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @forelse($sessions as $session)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $session->time->format('H:i, l, j M Y') }}</td>
                    <td>{{ $session->name }}</td>
                    <td>{{ $session->cost }} credits</td>
                    <td>
                        @if($session->capacity)
                            0 / {{ $session->capacity }}
                        @else
                            0
                        @endif
                    </td>
                    <td class="text-end">
                        <a href="{{ route('sessions.show', $session->id) }}">View &raquo;</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No sessions found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
