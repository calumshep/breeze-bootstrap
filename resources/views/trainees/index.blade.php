@extends('layouts.app')

@section('content')

    <div class="d-md-flex justify-content-between align-items-baseline mb-3">
        <h1>Manage your trainees</h1>
        <a href="{{ route('trainees.create') }}" class="btn btn-primary">Add new trainee</a>
    </div>

    <p>
        Trainee accounts are for your children and/or any minors for whom you are their legal guardian. A trainee
        account allows you to use your own account credit to make bookings for that trainee, all under the same login.
    </p>

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
            @forelse($trainees as $trainee)
                <tr>
                    <td>{{ $trainee->first_name }}</td>
                    <td>{{ $trainee->last_name }}</td>
                    <td>{{ $trainee->dob->format('d/m/Y') }}</td>
                    <td class="text-end">
                        <a href="{{ route('trainees.show', $trainee->id) }}">View &raquo;</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No trainees found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
