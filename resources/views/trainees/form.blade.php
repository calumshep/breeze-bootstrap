@extends('layouts.app')

@section('content')

    <div class="d-md-flex justify-content-between align-items-baseline">
        <h1>{{ str_contains(Route::currentRouteName(), 'create') ? 'Add New ' : '' }}Trainee</h1>
        <div class="mb-3">
            @if(str_contains(Route::currentRouteName(), 'show'))
                <a href="{{ route('trainees.edit', $trainee) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('trainees.index') }}" class="btn btn-secondary">Back</a>
            @elseif(str_contains(Route::currentRouteName(), 'edit'))
                <a href="{{ route('trainees.show', $trainee) }}" class="btn btn-secondary">Back</a>
            @elseif(str_contains(Route::currentRouteName(), 'create'))
                <a href="{{ route('trainees.index') }}" class="btn btn-secondary">Back</a>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <form @if(!str_contains(Route::currentRouteName(), 'show')) method="POST" @endif

                  @if(str_contains(Route::currentRouteName(), 'create'))
                      action="{{ route('trainees.store') }}"
                  @elseif(str_contains(Route::currentRouteName(), 'edit'))
                      action="{{ route('trainees.update', $trainee) }}"
                  @endif>

                @csrf
                @if(str_contains(Route::currentRouteName(), 'edit')) @method('PUT') @endif

                <div class="mb-3">
                    <label for="name" class="form-label">
                        First name(s)<span class="text-danger">*</span>
                    </label>

                    <input type="text"
                           name="first_name"
                           id="name"
                           class="form-control"
                           required
                           @if(str_contains(Route::currentRouteName(), 'show')) readonly @endif
                           @if(isset($trainee)) value="{{ $trainee->first_name }}" @endif>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">
                        Last name<span class="text-danger">*</span>
                    </label>

                    <input type="text"
                           name="last_name"
                           id="name"
                           class="form-control"
                           required
                           @if(str_contains(Route::currentRouteName(), 'show')) readonly @endif
                           @if(isset($trainee)) value="{{ $trainee->last_name }}" @endif>
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">
                        Date of Birth<span class="text-danger">*</span>
                    </label>

                    <input type="date"
                           name="dob"
                           id="date"
                           class="form-control"
                           required
                           @if(str_contains(Route::currentRouteName(), 'show')) readonly @endif
                           @if(isset($trainee)) value="{{ $trainee->dob->format('Y-m-d') }}" @endif>
                </div>

                @if(!str_contains(Route::currentRouteName(), 'show'))
                    @if(str_contains(Route::currentRouteName(), 'create'))
                        <button type="reset" class="btn btn-lg btn-danger">Reset</button>
                    @elseif(str_contains(Route::currentRouteName(), 'edit'))
                        <a href="{{ route('trainees.show', $trainee) }}" class="btn btn-lg btn-danger">Cancel</a>
                    @endif
                    <button type="submit" class="btn btn-lg btn-success">Save</button>
                @endif
            </form>
        </div>

        <div class="col-md-6">
            @if(str_contains(Route::currentRouteName(), 'show'))
                @include('layouts.transactions')
            @endif
        </div>
    </div>

@endsection
