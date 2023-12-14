@extends('layout.template')

@section('content')

<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-12 col-sm-8 col-md-6 m-auto">
            <div class="card border-0 shadow">
                <div class="card-body text-center">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <img src="{{ asset('images/logo.png') }}" alt="Rumah Musik Logo" width="100" height="100">
                        <input type="text" name="username" id="username" class="form-control my-4 py-2" placeholder="Username" required>
                        <input type="email" name="email" id="email" class="form-control my-4 py-2" placeholder="Email" required>
                        <input type="password" name="password" id="password" class="form-control my-4 py-2" placeholder="Password" minlength="8" required>
                        <input type="password" name="confPasword" id="confPassword" class="form-control my-4 py-2" placeholder="Confirm Password" minlength="8" required>
                        <div class="text-center mt-3">
                            <button class="btn btn-primary">
                                Register
                            </button>
                            <a href="{{ route('loginPage') }}" class="nav-link mt-3">Already have an account?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection