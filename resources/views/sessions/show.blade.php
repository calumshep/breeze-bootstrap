@extends('layouts.app')

@section('content')

<h3 class="card-title">{{ $session->name }}</h3>

<h5 class="card-subtitle">{{ $session->time->format('H:i, l, j M Y') }}</h5>
<p class="card-text">{{ $session->description }}</p>
<p class="card-text"><strong>Cost:&nbsp;</strong> {{ $session->cost }} training day</p>

<div class="row mb-3">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Attendees</h4>

                @foreach($session->bookedUsers as $user)
                    <p>{{ $user->first_name . ' ' . $user->last_name }}</p>
                @endforeach

                @foreach($session->bookedTrainees as $trainee)
                    <p>{{ $trainee->first_name . ' ' . $trainee->last_name }}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
