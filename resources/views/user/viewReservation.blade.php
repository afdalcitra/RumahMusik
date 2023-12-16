@extends('layout.template')
@include('layout.navbar')

@section('content')

<div class="reservation-container">

    <div class="page-container">
        <div class="home-title">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="mt-5">Your Reservation History</h1>
                    <p class="lead">Thank you for using our service!</p>
                </div>
            </div>
        </div>
    
        @if (Session::has('reservation_update_success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('reservation_update_success') }}
            </div>
        @endif
    
        @if (Session::has('reservation_update_error'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('reservation_update_error') }}
            </div>
        @endif
    
        @if (Session::has('reservation_cancel_success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('reservation_cancel_success') }}
            </div>
        @endif
    
        @if (Session::has('reservation_cancel_error'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('reservation_cancel_error') }}
            </div>
        @endif
    
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalPrice = 0;
                @endphp
    
                @foreach ($reservations as $reservation)
                    @if ($reservation->tanggal_dikembalikan === null)
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
                            
                            // Add the calculated price to the overall totalPrice variable
                            $totalPrice += $rentPrice;
                            @endphp
                            
                            <td>{{ $dateGap }}</td>
                            <td>{{ $reservation->tanggal_dikembalikan ?? '-' }}</td>
                            <td>Rp{{ number_format($rentPrice, 0, ',', '.') }}</td>
                            <td>
                                <form id="updateReservation_{{ $reservation->id }}" action="{{ route('editReservation', ['reservationId' => $reservation->id]) }}" method="post">
                                    @csrf
                                    <a class="btn btn-primary" name="editReservation_{{ $reservation->id }}" data-bs-toggle="modal" data-bs-target="#editReservation_{{ $reservation->id }}">Edit</a>
                                    <div class="reservation--edit-modal">
                                        <div class="modal fade" id="editReservation_{{ $reservation->id }}" tabindex="-1" aria-labelledby="editReservation_{{ $reservation->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Reservation Details</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label for="datepickerstart">Starting at:</label>
                                                        <input class="form-control" type="date" name="datepickerstart" id="datepickerstart" value="{{ $reservation->tanggal_peminjaman }}">
                                                    </div>
                                                    <div class="modal-body">
                                                        <label for="datepickerend">Until:</label>
                                                        <input class="form-control" type="date" name="datepickerend" id="datepickerend" value="{{ $reservation->akhir_peminjaman }}">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <a href="#" class="btn btn-primary" onclick="document.getElementById('updateReservation_{{ $reservation->id }}').submit();">Order Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form id="cancelForm_{{ $reservation->id }}" action="{{ route('cancelReservation', $reservation->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="button" onclick="confirmDelete('{{ $reservation->id }}')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    
        <!-- Display Total Price -->
        <div class="mt-4">
            <strong>Total Price: Rp{{ number_format($totalPrice, 0, ',', '.') }}</strong>
        </div>
    </div>

</div>


<script>
    function confirmDelete(reservationId) {
        if (confirm("Are you sure you want to cancel this reservation?")) {
            // If the user clicks "OK" in the confirmation alert, submit the form
            document.getElementById('cancelForm_' + reservationId).submit();
        }
    }
</script>

@endsection
