<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container">
        <span class="navbar-brand">Training Manager</span>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto">
                <li class="navbar-item">
                    <a href="{{ route('dashboard') }}"
                       class="nav-link px-2 @if(Route::currentRouteName() == 'dashboard') active @endif">
                        Home
                    </a>
                </li>

                <li class="navbar-item">
                    <a href="{{ route('trainees.index') }}"
                       class="nav-link px-2 @if(str_contains(Route::currentRouteName(), 'trainees')) active @endif">
                        Trainees
                    </a>
                </li>

                @can('manage training sessions')
                    <li class="navbar-item">
                        <a href="{{ route('sessions.index') }}"
                           class="nav-link px-2 @if(str_contains(Route::currentRouteName(), 'sessions')) active @endif">
                            Sessions
                        </a>
                    </li>
                @endcan
            </ul>

            @auth
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Hello, {{ auth()->user()->first_name }}
                            <img src="https://via.placeholder.com/50" alt="Profile icon" width="32" height="32" class="rounded-circle ms-2 mb-1">
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('account.own') }}">Account</a></li>
                            <li><a class="dropdown-item" href="#">Credit</a></li>


                            <div class="dropdown-divider"></div>

                            <form class="px-3" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn btn-secondary" type="submit">Sign out</button>
                            </form>
                        </ul>
                    </li>
                </ul>
            @else
                <div class="text-end">
                    <a href="{{ route('login') }}" class="btn btn-primary me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-secondary">Sign-up</a>
                </div>
            @endauth
        </div>
    </div>
</nav>
