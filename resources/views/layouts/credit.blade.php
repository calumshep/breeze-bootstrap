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
