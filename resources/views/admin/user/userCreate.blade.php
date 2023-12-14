@extends('layout.template')
@include('layout.adminNav')

@section('content')

<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-12 col-sm-8 col-md-12 m-auto">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <form action="" method="post" onsubmit="return validateForm()">
                        <h1>Create New User</h1>
                        <p>Please fill out the form below to create a new user!</p>
                        
                        <label for="username" class="">Username</label>
                        <input type="text" name="" id="" class="form-control py-2 mb-4" placeholder="Username" required>
                        
                        <label for="email" class="">Email</label>
                        <input type="email" name="" id="" class="form-control py-2 mb-4" placeholder="Email" required>
                        
                        <label for="password" class="">Password</label>
                        <input type="password" name="" id="" class="form-control py-2 mb-4" placeholder="Password" required>

                        <label for="confirmPassword" class="">Confirm Password</label>
                        <input type="password" name="" id="" class="form-control py-2 mb-4" placeholder="Confirm Password" minlength="8" required>

                        <label for="role-check">Select Role:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="userRole" checked>
                            <label class="form-check-label" for="userRole">
                                User
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="adminRole">
                            <label class="form-check-label" for="adminRole">
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

<script>
    function validateForm() {
        // Get all radio buttons with the name "role"
        var radioButtons = document.querySelectorAll('input[name="role"]');
        
        // Check if at least one radio button is checked
        var atLeastOneChecked = Array.prototype.slice.call(radioButtons).some(function(radioButton) {
            return radioButton.checked;
        });

        // Display an alert if no radio button is checked
        if (!atLeastOneChecked) {
            alert("Please select a role.");
            return false; // Prevent form submission
        }

        // Continue with form submission if at least one radio button is checked
        return true;
    }
</script>

@endsection
