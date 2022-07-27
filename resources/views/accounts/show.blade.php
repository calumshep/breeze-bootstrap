@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6">
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
            <div class="accordion" id="account-accordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                            Credit Balance
                        </button>
                    </h2>

                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#account-accordion">
                        <div class="accordion-body">
                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
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
                            <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
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
                            <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
