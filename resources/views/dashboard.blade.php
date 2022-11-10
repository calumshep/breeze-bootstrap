@extends('layouts.app')

@section('content')

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="d-flex align-items-start justify-content-between">
                <div>
                    <h1>Scottish Ski Club</h1>
                    <p class="lead">
                        Welcome to Scottish Ski Club's training management system. You can book yourself or any of your
                        trainees into the upcoming sessions below.
                    </p>
                </div>
                <img width="150px" class="img-fluid" src="img/logo.png" alt="SSC Logo">
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="card-title">Your credit</h3>
                    <!--<p class="card-text flex align-items-baseline fs-5">
                        <span class="border rounded p-2">15</span> <strong>training days</strong>
                    </p>-->

                    <div class="list-group mb-3">
                        @foreach(auth()->user()->trainees as $trainee)
                            <a href="{{ route('trainees.show', $trainee) }}" class="list-group-item list-group-item-action">
                                <strong>{{ $trainee->first_name . ' ' . $trainee->last_name }}:</strong>
                                {{ $trainee->credit }} training days
                            </a>
                        @endforeach
                    </div>

                    <!--<a href="#" class="btn btn-primary btn-lg">Add credit</a>
                    <a href="#" class="btn btn-secondary btn-lg">Transaction history</a>-->
                </div>
            </div>
        </div>
    </div>

    <h1 class="text-center">Upcoming Sessions</h1>

    @include('layouts.status')

    @forelse($sessions as $session)
        <div class="card mb-3">
            <div class="card-body row">
                <h3 class="card-title">{{ $session->name }}</h3>
                <div class="col-md-6">
                    <h5 class="card-subtitle">{{ $session->time->format('H:i, l, j M Y') }}</h5>
                    <p class="card-text">{{ $session->description }}</p>
                    <p class="card-text"><strong>Cost:&nbsp;</strong> {{ $session->cost }} training day</p>
                    <a href="{{ route('sessions.view', $session) }}" class="btn btn-primary btn-lg">
                        More details &raquo;
                    </a>
                </div>
                <div class="col-md-6">
                    <form method="POST" action="{{ route('sessions.book', $session) }}">
                        @csrf

                        <label for="booking{{ $loop->index }}">Book in...</label>
                        <div class="input-group mb-3">
                            <select class="form-select" id="booking{{ $loop->index }}" name="book">
                                <!--<option selected value="-1">Yourself</option>-->
                                <option disabled selected>Select...</option>

                                @foreach(auth()->user()->trainees as $trainee)
                                    <option value="{{ $trainee->id }}">
                                        {{ $trainee->first_name . ' ' . $trainee->last_name }}
                                    </option>
                                @endforeach
                            </select>

                            <button type="submit" class="btn btn-primary">Book</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @empty

        <p>There are no upcoming sessions!</p>

    @endforelse

    {{ $sessions->links() }}

@endsection
