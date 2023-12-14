@extends('layout.template')
@include('layout.adminNav')

@section('content')

<div class="entries-container pt-4 mt-4 text-center">
    <h1>Rental Submission</h1>
    <div class="input-group mt-4">
        <div class="col-md-12">
            <form action="" method="post" class="d-flex">
                <input type="text" class="form-control form-search" placeholder="Search username" aria-label="Recipient's username" aria-describedby="basic-addon2">
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
                <th>Returned at</th>
                <th>Price</th>
                <th>Penalty</th>
                <th class="text-end">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Add your table rows with data here -->
            <tr>
                <td>John Doe</td>
                <td>Bass Listrik</td>
                <td>2023-12-15</td>
                <td>-</td>
                <td>Rp150000</td>
                <td>-</td>
                <td class="text-end">
                    <!-- Add action buttons here -->
                    <form action="" method="post">
                        <button class="btn btn-primary">Returned</button>
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <!-- Add your table rows with data here -->
            <tr>
                <td>Mary Doe</td>
                <td>Drumset</td>
                <td>2023-12-12</td>
                <td>2023-12-13</td>
                <td>Rp150000</td>
                <td>-</td>
                <td class="text-end">
                    <!-- Add action buttons here -->
                    <form action="" method="post">
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <!-- Repeat this structure for each row -->
            <!-- Repeat this structure for each row -->
            
        </tbody>
    </table>
</div>

@endsection
