@extends('layouts.app')

@section('content')

    <div class="d-md-flex justify-content-between align-items-baseline">
        <h1>Sessions Admin</h1>
        <a href="{{ route('sessions.create') }}" class="btn btn-primary">New session</a>
    </div>

    <table class="table table-hover">
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
                    <td>{{ $loop->index }}</td>
                    <td>{{ $session->time }}</td>
                    <td>{{ $session->name }}</td>
                    <td>{{ $session->cost }} credits</td>
                    <td>
                        @if($session->capacity)
                            0 / {{ $session->capacity }}
                        @else
                            0
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('sessions.show', $session->id) }}">View</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No sessions found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
