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
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Login</a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Logout</a></li>   
                </ul>
            </li>
        </div>
    </div>
</nav>
