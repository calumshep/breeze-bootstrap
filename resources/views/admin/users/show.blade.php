@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1 class="mb-3">View Account</h1>
                <div>
                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-secondary">Edit</a>
                </div>
            </div>

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

            <div class="card">
                <div class="card-body">
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
            <input type="text" name="credits" value="{{ $user->credits }}">
        </div>
    </div>

@endsection
