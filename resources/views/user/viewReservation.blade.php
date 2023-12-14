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
                <th>Instrument</th>
                <th>Rented at</th>
                <th>Returned at</th>
                <th>Price</th>
                <th>Penalty</th>
            </tr>
        </thead>
        <tbody>
            <!-- Add your table rows with data here -->
            <tr>
                <td>Bass Listrik</td>
                <td>2023-12-15</td>
                <td>-</td>
                <td>Rp150000</td>
                <td>-</td>
            </tr>
            <!-- Add your table rows with data here -->
            <tr>
                <td>Drumset</td>
                <td>2023-12-12</td>
                <td>2023-12-13</td>
                <td>Rp150000</td>
                <td>-</td>
            </tr>
            <!-- Repeat this structure for each row -->
            <!-- Repeat this structure for each row -->
            
        </tbody>
    </table>
    </div>
</div>
@endsection
