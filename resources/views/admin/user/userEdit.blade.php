@extends('layout.template')
@include('layout.adminNav')

@section('content')

<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-12 col-sm-8 col-md-12 m-auto">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <form action="" method="post">
                        <h1>Edit User</h1>
                        <p>You can change the content of the form to update the user profile</p>
                        <label for="username" class="">Username</label>
                        <input type="text" name="" id="" class="form-control py-2 mb-4" placeholder="Username" required>
                        
                        <label for="email" class="">Email</label>
                        <input type="email" name="" id="" class="form-control py-2 mb-4" placeholder="Email" required>
                        
                        <label for="password" class="">Password</label>
                        <input type="password" name="" id="" class="form-control py-2 mb-4" placeholder="Password" required>

                        <label for="role-check">Is Admin?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                User
                            </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Admin
                            </label>
                        </div>
                        <div class="text-center mt-3">
                            <button class="btn btn-primary">
                                Create User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
