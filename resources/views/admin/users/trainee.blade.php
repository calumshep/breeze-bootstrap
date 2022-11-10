@extends('layouts.app')

@section('content')

    <a href="{{ route('admin.users.show', $trainee->user) }}" class="btn btn-secondary mb-3">Back</a>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="card-title">View Trainee</h3>

                    <form class="card-text">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">
                                First name(s)
                            </label>
                            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $trainee->first_name }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="last_name" class="form-label">
                                Last name
                            </label>
                            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $trainee->last_name }}" readonly>
                        </div>

                        <div>
                            <label for="dob" class="form-label">
                                Last name
                            </label>
                            <input type="date" name="dob" id="dob" class="form-control" value="{{ $trainee->dob->format('Y-m-d') }}" readonly>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">

            @if(session('status'))
                <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                    {{ session('status')  }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                        {{ $error }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endforeach
            @endif

            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="card-title">
                        Credit:
                        <span class="border rounded px-2">{{ $trainee->credit }}</span>
                        training days
                    </h3>

                    <form method="POST" action="{{ route('credit.set') }}">
                        @csrf
                        <input type="hidden" name="trainee_id" value="{{ $trainee->id }}">

                        <label for="amount">New credit balance</label>
                        <div class="input-group mb-3">
                            <input type="number" name="amount" id="amount" class="form-control" value="{{ $trainee->credit }}">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>

            @include('layouts.transactions')
        </div>
    </div>

@endsection
