@extends('layout.template')

@section('content')

<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-12 col-sm-8 col-md-6 m-auto">
            <div class="card border-0 shadow">
                <div class="card-body text-center">
                    <form action="" method="post">
                        <img src="{{ asset('images/logo.png') }}" alt="Rumah Musik Logo" width="100" height="100">
                        <input type="text" name="" id="" class="form-control my-4 py-2" placeholder="Username">
                        <input type="password" name="" id="" class="form-control my-4 py-2" placeholder="Password">
                        <div class="text-center mt-3">
                            <button class="btn btn-primary">
                                Login
                            </button>
                            <a href="" class="nav-link mt-3">Don't have an account?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection