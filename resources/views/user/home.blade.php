@extends('layout.template')
@include('layout.navbar')

@section('content')

<div class="page-container">

    <div class="home-title">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="mt-5">Welcome to Rumah Musik!</h1>
                <p class="lead">Find the perfect rental for musical day!</p>
            </div>
        </div>
    </div>
    
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-3 mb-3">
                <form action="" method="post">
                    <div class="card card-container d-flex flex-column" style="width: 18rem;">
                        <img src="{{ asset('images/bass_listrik.jpg') }}" class="card-img-top custom-card-img" alt="bass listrik">
                        <div class="card-body flex-grow-1">
                            <h4 class="card-title">Unit Name</h4>
                            <p class="card-text">Rp100000</p>
                            <p class="card-text">Category 1, Category 2</p>
                            <div class="text-center mt-auto">
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reservationModal">Reservation Now</a>
                            </div>
                            <!-- Modal -->
                            <div class="reservation-modal">
                                <div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="reservationModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Reservation</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <label for="date">Reservation Date</label>
                                                <input type="date" name="date" id="date" class="form-control py-2 mb-4" required>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <a href="#" class="btn btn-primary">Confirm</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-3 mb-3">
                <form action="" method="post">
                    <div class="card card-container d-flex flex-column" style="width: 18rem;">
                        <img src="{{ asset('images/bass_listrik.jpg') }}" class="card-img-top custom-card-img" alt="bass listrik">
                        <div class="card-body flex-grow-1">
                            <h4 class="card-title">Unit Name</h4>
                            <p class="card-text">Rp100000</p>
                            <p class="card-text">Category 1, Category 2</p>
                            <div class="text-center mt-auto">
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reservationModal">Reservation Now</a>
                            </div>
                            <!-- Modal -->
                            <div class="reservation-modal">
                                <div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="reservationModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Reservation</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <label for="date">Reservation Date</label>
                                                <input type="date" name="date" id="date" class="form-control py-2 mb-4" required>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <a href="#" class="btn btn-primary">Confirm</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-3 mb-3">
                <form action="" method="post">
                    <div class="card card-container d-flex flex-column" style="width: 18rem;">
                        <img src="{{ asset('images/bass_listrik.jpg') }}" class="card-img-top custom-card-img" alt="bass listrik">
                        <div class="card-body flex-grow-1">
                            <h4 class="card-title">Unit Name</h4>
                            <p class="card-text">Rp100000</p>
                            <p class="card-text">Category 1, Category 2</p>
                            <div class="text-center mt-auto">
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reservationModal">Reservation Now</a>
                            </div>
                            <!-- Modal -->
                            <div class="reservation-modal">
                                <div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="reservationModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Reservation</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <label for="date">Reservation Date</label>
                                                <input type="date" name="date" id="date" class="form-control py-2 mb-4" required>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <a href="#" class="btn btn-primary">Confirm</a>
                                            </div>
                                        </div>
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
@endsection
