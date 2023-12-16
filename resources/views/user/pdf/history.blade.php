<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation History</title>
    <!-- Add any necessary styles for your PDF here -->
</head>
<body>
    <h1>Reservation History</h1>

    @if ($reservations->isEmpty())
        <p>No reservation history.</p>
    @else
        <table border="1" cellspacing="0" cellpadding="10">
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
                    $totalReservations = 0;
                    $returnedReservations = 0;
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

                            // Increment the totalReservations count
                            $totalReservations++;

                            // Increment the returnedReservations count if "returned at" is NOT NULL
                            if ($reservation->tanggal_dikembalikan !== null) {
                                $returnedReservations++;
                            }
                            
                        @endphp

                        <td>{{ $dateGap }}</td>
                        <td>{{ $reservation->tanggal_dikembalikan ?? '-' }}</td>
                        <td>Rp{{ number_format($rentPrice, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br>
        <br>

        <!-- Display Total Price -->
        <div class="mt-4">
            <strong>Expense Total: Rp{{ number_format($totalPrice, 0, ',', '.') }}</strong>
        </div>

        <!-- Display Conclusions -->
        <div class="mt-4">
            <strong>Total Reservations: {{ $totalReservations }}</strong><br>
            <strong>Returned Reservations: {{ $returnedReservations }}</strong><br>
            <strong>Unreturned Reservations: {{ $totalReservations - $returnedReservations }}</strong>
        </div>
    @endif
</body>
</html>
