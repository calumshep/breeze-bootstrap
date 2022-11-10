@extends('layouts.app')

@section('content')

    <a href="{{ route('admin.index') }}" class="btn btn-secondary mb-3">Back</a>

    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status')  }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endforeach
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between align-items-baseline">
                        <h1 class="mb-3">Account</h1>
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-secondary">Edit</a>
                    </div>

                    <form>
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="first_name" class="form-label">
                                    First name(s)<span class="text-danger">*</span>
                                </label>
                                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $user->first_name }}" readonly>
                            </div>

                            <div class="col-md-6">
                                <label for="last_name" class="form-label">
                                    Last name<span class="text-danger">*</span>
                                </label>
                                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $user->last_name }}" readonly>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">
                                Email address<span class="text-danger">*</span>
                            </label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="dob" class="form-label">
                                Date of Birth<span class="text-danger">*</span>
                            </label>
                            <input type="date" name="dob" id="dob" class="form-control" value="{{ $user->dob->format('Y-m-d') }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="local_area" class="form-label">
                                Local Area
                            </label>
                            <input type="text" name="local_area" id="local_area" class="form-control" value="{{ $user->local_area }}" readonly>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body">
                    <h4>Trainees</h4>

                    <table class="table table-hover table-striped card-text">
                        <thead>
                        <tr>
                            <th>First Name(s)</th>
                            <th>Last Name</th>
                            <th>Credit</th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                        @forelse($trainees as $trainee)
                            <tr>
                                <td>{{ $trainee->first_name }}</td>
                                <td>{{ $trainee->last_name }}</td>
                                <td>{{ $trainee->credit }} training days</td>
                                <td class="text-end">
                                    <a href="{{ route('admin.users.trainee', [$user, $trainee->id]) }}">View &raquo;</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No trainees found.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
