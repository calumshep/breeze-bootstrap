@extends('layouts.app')

@section('content')

    <h1 class="mb-3">Your Account</h1>

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
                    <form method="POST" action="{{ route('account.update', auth()->user()) }}">
                        @csrf
                        @if(Route::currentRouteName() == 'account.own') @method('PUT') @endif

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="first_name" class="form-label">
                                    First name(s)<span class="text-danger">*</span>
                                </label>
                                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ auth()->user()->first_name }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="last_name" class="form-label">
                                    Last name<span class="text-danger">*</span>
                                </label>
                                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ auth()->user()->last_name }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">
                                Email address<span class="text-danger">*</span>
                            </label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ auth()->user()->email }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="dob" class="form-label">
                                Date of Birth<span class="text-danger">*</span>
                            </label>
                            <input type="date" name="dob" id="dob" class="form-control" value="{{ auth()->user()->dob->format('Y-m-d') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="new_password" class="form-label">
                                New password
                            </label>
                            <input type="password" name="new_password" id="new_password" autocomplete="new_password" class="form-control">
                            <small class="text-muted">Only needed to change password</small>
                        </div>

                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label">
                                Confirm new password
                            </label>
                            <input type="password" name="new_password_confirmation" id="new_password_confirmation" autocomplete="new_password" class="form-control">
                            <small class="text-muted">Only needed to change password</small>
                        </div>

                        <div class="card bg-light">
                            <div class="card-body">
                                <label for="current_password" class="form-label">
                                    Current password<span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <input type="password" name="current_password" id="current_password" autocomplete="current_password" class="form-control" required>
                                    <button type="submit" class="btn btn-success">Save changes</button>
                                </div>
                                <small class="text-muted">Must be given to update any account details</small>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            @include('layouts.credit')

            <!--<div class="accordion" id="account-accordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                            Credit Balance
                        </button>
                    </h2>

                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#account-accordion">
                        <div class="accordion-body">
                            <h2 class="mb-0">
                                Your credit:
                                <span class="border rounded px-2">{{ auth()->user()->credits }}</span>
                                training days
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Credit History
                        </button>
                    </h2>

                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#account-accordion">
                        <div class="accordion-body">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Net</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="2">No transactions found.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Add Credit
                        </button>
                    </h2>

                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#account-accordion">
                        <div class="accordion-body">
                            <-- Credit product select: https://getbootstrap.com/docs/5.2/examples/list-groups/ --
                            <div class="list-group list-group-radio d-grid gap-2 border-0 w-auto mb-3">
                                <div class="position-relative">
                                    <input class="form-check-input position-absolute top-50 end-0 me-3 fs-5" type="radio" name="creditOptions" id="creditOptions1" value="40" checked>
                                    <input type="hidden" name="cost1" id="cost1" value="600">

                                    <label class="list-group-item py-3 pe-5" for="creditOptions1">
                                        <strong class="fw-semibold">20 training days</strong> &middot; <span class="text-muted">£600</span>

                                        <span class="d-block small opacity-75">
                                            Ideal if you want to train every weekend!
                                        </span>
                                    </label>
                                </div>

                                <div class="position-relative">
                                    <input class="form-check-input position-absolute top-50 end-0 me-3 fs-5" type="radio" name="creditOptions" id="creditOptions2" value="20">
                                    <input type="hidden" name="cost2" id="cost2" value="350">

                                    <label class="list-group-item py-3 pe-5" for="creditOptions2">
                                        <strong class="fw-semibold">10 training days</strong> &middot; <span class="text-muted">£350</span>

                                        <span class="d-block small opacity-75">
                                            Ideal if you will be around for most of the season.
                                        </span>
                                    </label>
                                </div>

                                <div class="position-relative">
                                    <input class="form-check-input position-absolute top-50 end-0 me-3 fs-5" type="radio" name="creditOptions" id="creditOptions3" value="1">
                                    <input type="hidden" name="cost3" id="cost3" value="40">

                                    <label class="list-group-item py-3 pe-5" for="creditOptions3">
                                        <strong class="fw-semibold">1 training day</strong> &middot; <span class="text-muted">£40</span>

                                        <span class="d-block small opacity-75">
                                            A single ad-hoc session, for if you want to try out race training, or you're
                                            not around much and want to supplement your program.
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <div class="btn btn-primary disabled">Purchase</div>
                        </div>
                    </div>
                </div>
            </div>-->
        </div>
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        // Attach event listener to each credit product option to update charged amount on click
        for (let i = 1; i <= 3; i++) {
            document.getElementById("creditOptions" + i).addEventListener("click", function () {
                // Gets the amount from the hidden input in each credit product list group item
                document.getElementById("chargeAmt").innerHTML = document.getElementById("cost" + i).value;
            });
        }

        // Initialise stripe
        let stripe = Stripe("{{ env('STRIPE_KEY') }}");
        let elements = stripe.elements();

        // Style stripe elements
        let style = {
            base: {
                iconColor: '#0d6efd',
                color: '#212529',
                fontWeight: '500',
                fontFamily: 'system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", "Liberation Sans", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"',
                fontSize: '16px',
                fontSmoothing: 'antialiased',
                ':-webkit-autofill': {
                    color: '#e8f0fe',
                },
                '::placeholder': {
                    color: '#212529',
                },
            },
            invalid: {
                iconColor: '#dc3546',
                color: '#dc3546',
            },
        };

        let card = elements.create('card', {style: style});
        card.mount('#card-element');
        let paymentMethod = null;

        // Actually handle card details
        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');

        cardButton.addEventListener('click', async (e) => {
            const { paymentMethod, error } = await stripe.createPaymentMethod(
                'card', card, {
                    billing_details: { name: cardHolderName.value }
                }
            );

            if (error) {
                // Display "error.message" to the user...
            } else {
                // The card has been verified successfully...
            }
        });
    </script>

@endsection
