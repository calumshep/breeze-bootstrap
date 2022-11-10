@extends('layouts.app')

@section('content')

    <div class="d-md-flex justify-content-between align-items-baseline mb-3">
        <h1>Manage users</h1>
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
                <th>First Name(s)</th>
                <th>Last Name</th>
                <th>Date of Birth</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->dob->format('d/m/Y') }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.users.show', $user->id) }}">View &raquo;</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No users found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
