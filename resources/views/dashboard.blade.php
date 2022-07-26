@extends('layouts.app')

@section('content')

    <div class="row mb-4 align-items-center">
        <div class="col-md-6">
            <p>
                Welcome to Scottish Ski Club's training management system. You can book yourself or any of your
                trainees into the upcoming sessions below. To book a particular session, select "More details"
                below the session you wish to book, where you can then select who you want to book in to it. You
                must have enough credit in your account to do so.
            </p>
        </div>

        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body">
                    <p class="card-text fs-3"><strong>Your credits:&nbsp;</strong>250</p>
                    <a href="#" class="btn btn-primary btn-lg">Add credit</a>
                    <a href="#" class="btn btn-secondary btn-lg">Transaction history</a>
                </div>
            </div>
        </div>
    </div>

    <h1 class="text-center">Upcoming Sessions</h1>

    @forelse($sessions as $session)
        <div class="card mb-3">
            <div class="card-body">
                <h3 class="card-title">{{ $session->name }}</h3>
                <h5 class="card-subtitle">{{ $session->time->format('H:i, l, j M Y') }}</h5>
                <p class="card-text">{{ $session->description }}</p>
                <p class="card-text"><strong>Cost:&nbsp;</strong> {{ $session->cost }} credits</p>
                <a href="#" class="btn btn-primary btn-lg">
                    More details &raquo;
                </a>
            </div>
        </div>
    @empty

    @endforelse

    {{ $sessions->links() }}

@endsection
