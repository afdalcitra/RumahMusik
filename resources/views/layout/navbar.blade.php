<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-body  pl-3 pr-3" data-bs-theme="dark">
    <div class="container-fluid custom-nav-container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/logo.png') }}" alt="Rumah Musik Logo" width="30" height="24">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">My Reservation</a>
                </li>
            </ul>
        </div>
        <div class="navbar-nav"> <!-- Adjust padding as needed -->
            <li class="nav-item dropdown" style>
                @auth
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ auth()->user()->username}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="userDropdown">
                        @if(auth()->user()->is_admin == 1)
                            <a class="dropdown-item" href="">Dashboard</a>
                            <div class="dropdown-divider"></div>
                        @endif
                        <a class="dropdown-item" href="">Lihat Profile</a>
                        <a id="button-logout" class="dropdown-item btn btn-danger" style="border-color: #D4E9F7;" onclick="document.getElementById('logoutForm').submit();">Logout</a>
                        <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                        @csrf
                </form>
                    </div>
                @else
                <a class="nav-link" href="{{ route('viewLogin') }}">Login
                    <span class="sr-only">(current)</span>
                </a>
                @endauth
            </li>
        </div>
    </div>
</nav>
