@extends('layout.template')
@include('layout.navbar')

@section('content')
<div class="page-container">
    <div class="home-title">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="mt-5">Your Reservation History</h1>
                <p class="lead">Thank you for using our service!</p>
            </div>
        </div>
    </div>

    <!-- Table -->
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Username</th>
                <th>Instrument</th>
                <th>Rented at</th>
                <th>Until</th>
                <th>Total Hari</th>
                <th>Returned at</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalPrice = 0;
            @endphp
            
            @foreach ($reservations as $reservation)
            <tr>
                <td>{{ $reservation->users->username }}</td>
                <td>{{ $reservation->instrument->name }}</td>
                <td>{{ $reservation->tanggal_peminjaman }}</td>
                <td>{{ $reservation->akhir_peminjaman }}</td>

                @php
                    // Calculate the date gap
                    $rentStartDate = Carbon\Carbon::parse($reservation->tanggal_peminjaman);
                    $rentEndDate = Carbon\Carbon::parse($reservation->akhir_peminjaman);
                    $dateGap = $rentStartDate->diffInDays($rentEndDate);
                    
                    // Calculate the total price based on the date gap and instrument price
                    $rentPrice = $dateGap * $reservation->instrument->price;
                    
                    
                @endphp

                <td>{{ $dateGap }}</td>
                <td>{{ $reservation->tanggal_dikembalikan ?? '-' }}</td>
                <td>Rp{{ number_format($rentPrice, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('generatePDF') }}" class="btn btn-primary mb-3">Print</a>
</div>
@endsection
