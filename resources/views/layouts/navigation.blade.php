<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container">
        <span class="navbar-brand">Training Manager</span>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="navbar-item @if(Route::currentRouteName() == 'dashboard') active @endif">
                    <a href="{{ route('dashboard') }}" class="nav-link px-2 link-secondary">Home</a>
                </li>

                @can('manage training sessions')
                    <li class="navbar-item @if(str_contains(Route::currentRouteName(), 'sessions')) active @endif">
                        <a href="{{ route('sessions.index') }}" class="nav-link px-2">Sessions</a>
                    </li>
                @endcan
            </ul>

            @auth
                <div class="dropdown text-white text-end">
                    <a href="#" class="d-block nav-link text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown">
                        {{ auth()->user()->name }}
                        <img src="https://via.placeholder.com/50" alt="Profile icon" width="32" height="32" class="rounded-circle ms-3 mb-1">
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Account</a></li>
                        <li><a class="dropdown-item" href="#">Trainees</a></li>

                        <div class="dropdown-divider"></div>

                        <form class="px-3" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-secondary" type="submit">Sign out</button>
                        </form>
                    </ul>
                </div>
            @else
                <div class="text-end">
                    <a href="{{ route('login') }}" class="btn btn-primary me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-secondary">Sign-up</a>
                </div>
            @endauth
        </div>
    </div>
</nav>
