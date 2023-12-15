@extends('layout.template')
@include('layout.navbar')

@section('content')

<div class="page-container">

    <div class="home-title">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="mt-5">Welcome to Rumah Musik!</h1>
                <p class="lead">Find the perfect rental for a musical day!</p>
            </div>
        </div>
    </div>

    <div class="container pt-5">
        <div class="row justify-content-center">
            @foreach ($instruments as $instrument)
                <div class="col-md-3 mb-3">
                    <form action="" method="post">
                        @csrf

                        <div class="card card-container" style="width: 100%; height: 100%;">
                            <img src="{{ asset('images/' . $instrument->image) }}" class="card-img-top custom-card-img" alt="{{ $instrument->name }}">
                            <div class="card-body d-flex flex-column">
                                <h4 class="card-title">{{ $instrument->name }}</h4>
                                <p class="card-text">Rp{{ number_format($instrument->price, 0, ',', '.') }}</p>
                                <p class="card-text">{{ $instrument->description }}</p>
                                <p class="card-text">
                                    @foreach ($instrument->categories as $item)
                                        <span class="btn btn-outline-secondary btn-sm mb-1">{{ $item->name }}</span>
                                    @endforeach
                                </p>
                                <div class="text-center mt-auto">
                                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reservationModal">Order</a>
                                </div>
                                <!-- Modal -->
                                <div class="reservation-modal">
                                    <!-- your modal code remains unchanged -->
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
