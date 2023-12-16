@extends('layout.template')
@include('layout.navbar')

@section('content')

<div class="entries-container pt-4 mt-4 text-center">
    <h1>Rental Submission</h1>
    <div class="input-group mt-4">
        <div class="col-md-12">
            <form action="{{ route('searchReservations') }}" method="post" class="d-flex">
                @csrf
                <input type="text" name="search" class="form-control form-search" placeholder="Search username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <button class="btn btn-primary py-2" type="submit" id="search-button">Search</button>
            </form>
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
                <th>Penalty</th>
                <th class="text-end">Action</th>
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
                        
                        // Add the calculated price to the overall totalPrice variable
                        $totalPrice += $rentPrice;
                    @endphp
                    <td>{{ $dateGap }}</td>
                    <td>{{ $reservation->tanggal_dikembalikan ?? '-' }}</td>


                    <td>{{ $rentPrice }}</td>
                    <td>
                        @if ($reservation->penalty)
                            {{ $reservation->penalty }}
                        @else
                            -
                        @endif
                    </td>
                    <td class="text-end">
                        @if (is_null($reservation->tanggal_dikembalikan))
                            <form action="{{ route('admin.returnInstrument', $reservation->id) }}" method="post">
                                @csrf
                                <button class="btn btn-primary">Returned</button>
                            </form>
                        @endif
                        <form id="deleteForm_{{ $reservation->id }}" action="{{ route('deleteReservation', $reservation->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="button" onclick="confirmDelete('{{ $reservation->id }}')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <!-- Display pagination links -->
    <div class="d-flex justify-content-between align-items-center mt-2 mb-2">
        <div>
            @if ($reservations->lastPage() > 1)
                <div class="pagination">
                    {{ $reservations->links('pagination') }}
                </div>
            @endif
        </div>
        <div>
            Showing {{ $reservations->firstItem() }} - {{ $reservations->lastItem() }} of {{ $reservations->total() }} results
        </div>
    </div>

</div>

<script>
    function confirmDelete(reservationId) {
        if (confirm("Are you sure you want to delete this reservation?")) {
            // If the user clicks "OK" in the confirmation alert, submit the form
            document.getElementById('deleteForm_' + reservationId).submit();
        }
    }
</script>

@endsection
