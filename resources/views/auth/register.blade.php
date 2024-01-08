@extends('layout.template')

@section('content')

<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-12 col-sm-8 col-md-6 m-auto">
            <div class="card border-0 shadow">
                <div class="card-body text-center">

                    <!-- START -->

                    <form action="{{ route('register') }}" method="POST" onsubmit="return validateForm()">
                        @csrf
                        <img src="{{ asset('images/logo.png') }}" alt="Rumah Musik Logo" width="100" height="100">

                        <!-- Display validation error for username -->
                        @error('username')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        @error('email')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        @error('password')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        @error('confPassword')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror

                        <input type="text" name="username" id="username" class="form-control my-4 py-2" placeholder="Username" required>

                        <!-- Display validation error for email -->

                        <input type="email" name="email" id="email" class="form-control my-4 py-2" placeholder="Email" required>

                        <!-- Display validation error for password -->

                        <input type="password" name="password" id="password" class="form-control my-4 py-2" placeholder="Password" minlength="8" required>

                        <!-- Display validation error for confirm password -->

                        <input type="password" name="confPassword" id="confPassword" class="form-control my-4 py-2" placeholder="Confirm Password" minlength="8" required>

                        <div class="text-center mt-3">
                            <button class="btn btn-primary">
                                Register
                            </button>
                            <a href="{{ route('loginPage') }}" class="nav-link mt-3">Already have an account?</a>
                        </div>
                    </form>

                    <!-- END -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function validateForm() {
        var password = document.getElementById("password").value;
        var confPassword = document.getElementById("confPassword").value;

        if (password !== confPassword) {
            alert("Passwords do not match");
            return false;
        }

        return true;
    }
</script>

@endsection
