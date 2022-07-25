@extends('layouts.app')

@section('content')
    <div class="d-md-flex justify-content-between align-items-baseline">
        <h1>Create New Session</h1>
        <a href="{{ route('sessions.index') }}" class="btn btn-secondary">Back to sessions</a>
    </div>

    <div class="row">
        <div class="col-12 col-md-6">
            <form method="POST" action="{{ route('sessions.store') }}">
                <div class="mb-3">
                    <label for="name" class="form-label">Session name<span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="row mb-3">
                    <div class="col-md-8">
                        <label for="date" class="form-label">Date<span class="text-danger">*</span></label>
                        <input type="date" name="date" id="date" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label for="time" class="form-label">Time<span class="text-danger">*</span></label>
                        <input type="time" name="time" id="time" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="cost" class="form-label">Session cost<span class="text-danger">*</span></label>

                    <div class="input-group">
                        <input type="number" name="cost" id="cost" class="form-control" required>
                        <span class="input-group-text">credits</span>
                    </div>

                    <small class="text-muted">Set to 0 to make the session free.</small>
                </div>

                <div class="mb-3">
                    <label for="capacity" class="form-label">Capacity</label>
                    <input type="number" name="capacity" id="capacity" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Session description</label>
                    <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-lg btn-primary">Save</button>
            </form>
        </div>
    </div>

@endsection
