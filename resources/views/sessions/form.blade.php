@extends('layouts.app')

@section('content')
    <div class="d-md-flex justify-content-between align-items-baseline">
        <h1>
            @if(str_contains(Route::currentRouteName(), 'create'))
                Create New Session
            @else
                View Session
            @endif
        </h1>
        <div>
            @if(str_contains(Route::currentRouteName(), 'show')) <a href="{{ route('sessions.edit', $session) }}" class="btn btn-primary">Edit</a> @endif
            <a href="{{ route('sessions.index') }}" class="btn btn-secondary">Back to sessions</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-6">
            <form @if(!str_contains(Route::currentRouteName(), 'show')) method="POST" @endif

                  @if(str_contains(Route::currentRouteName(), 'create'))
                      action="{{ route('sessions.store') }}"
                  @elseif(str_contains(Route::currentRouteName(), 'edit'))
                      action="{{ route('sessions.update', $session) }}"
                  @endif>

                @csrf
                @if(str_contains(Route::currentRouteName(), 'edit')) @method('PATCH') @endif

                @if($errors->any())
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $error }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endforeach
                @endif

                <div class="mb-3">
                    <label for="name" class="form-label">
                        Session name<span class="text-danger">*</span>
                    </label>

                    <input type="text"
                           name="name"
                           id="name"
                           class="form-control"
                           required
                           @if(str_contains(Route::currentRouteName(), 'show')) readonly @endif
                           @if(isset($session)) value="{{ $session->name }}" @endif>
                </div>

                <div class="row mb-3">
                    <div class="col-md-8">
                        <label for="date" class="form-label">
                            Date<span class="text-danger">*</span>
                        </label>
                        <input type="date"
                               name="date"
                               id="date"
                               class="form-control"
                               required
                               @if(str_contains(Route::currentRouteName(), 'show')) readonly @endif
                               @if(isset($session)) value="{{ $session->time->format('Y-m-d') }}" @endif>
                    </div>

                    <div class="col-md-4">
                        <label for="time" class="form-label">Time<span class="text-danger">*</span></label>
                        <input type="time"
                               name="time"
                               id="time"
                               class="form-control"
                               required
                               @if(str_contains(Route::currentRouteName(), 'show')) readonly @endif
                               @if(isset($session)) value="{{ $session->time->format('H:i') }}" @endif>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="cost" class="form-label">Session cost<span class="text-danger">*</span></label>

                    <div class="input-group">
                        <input type="number"
                               name="cost"
                               id="cost"
                               class="form-control"
                               required
                               @if(str_contains(Route::currentRouteName(), 'show')) readonly @endif
                               @if(isset($session)) value="{{ $session->cost }}" @endif>
                        <span class="input-group-text">training day(s)</span>
                    </div>

                    @if(!str_contains(Route::currentRouteName(), 'show'))
                        <small class="text-muted">Set to 0 to make the session free.</small>
                    @endif
                </div>

                <div class="mb-3">

                    @if(str_contains(Route::currentRouteName(), 'show'))
                        <div class="d-flex justify-content-between align-items-baseline border-bottom">
                            <h3>Bookings</h3>
                            <p>{{ $session->capacity ? "0/".$session->capacity : "0" }}</p>
                        </div>
                    @else
                        <label for="capacity" class="form-label">Capacity</label>
                        <input type="number"
                               name="capacity"
                               id="capacity"
                               class="form-control"
                               @if(isset($session)) value="{{ $session->capacity }}" @endif>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Session description<span class="text-danger">*</span></label>
                    <textarea name="description"
                              id="description"
                              class="form-control"
                              rows="3"
                              required
                              @if(str_contains(Route::currentRouteName(), 'show')) readonly @endif
                    >@if(isset($session)){{ $session->description }}@endif</textarea>
                </div>

                @if(!str_contains(Route::currentRouteName(), 'show'))
                    @if(str_contains(Route::currentRouteName(), 'create'))
                        <button type="reset" class="btn btn-lg btn-danger">Reset</button>
                    @elseif(str_contains(Route::currentRouteName(), 'edit'))
                        <a href="{{ route('sessions.show', $session) }}" class="btn btn-lg btn-danger">Cancel</a>
                    @endif
                    <button type="submit" class="btn btn-lg btn-success">Save</button>
                @endif
            </form>
        </div>
    </div>

@endsection
