@extends('layout.template')
@include('layout.navbar')

@section('content')

<div class="profile-info-container pt-4 mt-4 page-container">
    <div class="column">
        <div class="col-12 col-sm-8 col-md-10 m-auto">
            
            <!-- Profile Information -->
            <div class="card border-0 shadow">
                <div class="card-body">
                    <h3>Profile Information</h3>
                    <p>Update your profile information</p>
                    <form action="" method="post">

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" value="" class="form-control">
                        </div>

                        <div class="form-group pt-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="" class="form-control">
                        </div>

                        <div class="form-button pt-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#profileUpdateModal">
                                Update
                            </button>
                            <div class="profile-update-modal">
                            <!-- Modal -->
                            <div class="modal fade" id="profileUpdateModal" tabindex="-1" aria-labelledby="profileUpdateModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Profile Update</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure want to update this profile?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <a href="#" class="btn btn-primary">Update</a>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Security Information -->
            <div class="card border-0 shadow mt-5">
                <div class="card-body">
                    <h3>Security Update</h3>
                    <p>Update your security information</p>
                    <form action="" method="post">

                        <div class="form-group">
                            <label for="password">Current Password</label>
                            <input type="password" name="password" id="password" value="" class="form-control">
                        </div>

                        <div class="form-group pt-3">
                            <label for="newPassword">New Password</label>
                            <input type="password" name="newPassword" id="newPassword" value="" class="form-control">
                        </div>

                        <div class="form-group pt-3">
                            <label for="confirmNewPassword">Confirm New Password</label>
                            <input type="password" name="confirmNewPassword" id="confirmNewPassword" value="" class="form-control">
                        </div>

                        <div class="form-button pt-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#securityUpdateModal">
                                Update
                            </button>
                            <div class="security-update-modal">
                                <!-- Modal -->
                                <div class="modal fade" id="securityUpdateModal" tabindex="-1" aria-labelledby="securityUpdateModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Security Update</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure want to update the security information?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <a href="#" class="btn btn-primary">Update</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Delete Account -->
            <div class="card border-0 shadow mt-5 mb-5">
                <div class="card-body">
                    <h3>Delete Account</h3>
                    <p>Warning, once the account is deleted, all of the saved data will be lost!</p>
                    <form action="" method="post">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                            Delete Account
                        </button>
                        <div class="delete-account-modal">
                            <!-- Modal -->
                            <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Account</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure want to delete this account?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <a href="#" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection