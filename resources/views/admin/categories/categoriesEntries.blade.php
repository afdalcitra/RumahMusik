@extends('layout.template')
@include('layout.adminNav')

@section('content')

<div class="entries-container pt-4 mt-4">
    <div class="button justify-content-center">
        <a class="btn btn-primary" href="#" role="button">Create New Category</a>
    </div>
    <div class="input-group mt-4">
        <div class="col-md-12">
            <form action="" method="post" class="d-flex">
                <input type="text" class="form-control form-search" placeholder="Search categories name" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <button class="btn btn-primary py-2" type="submit" id="search-button">Search</button>
            </form>
        </div>
    </div>

    <!-- Table -->
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Categories</th>
                <th class="text-end">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Add your table rows with data here -->
            <tr>
                <td>Category 1</td>
                <td class="text-end">
                    <!-- Add action buttons here -->
                    <form action="" method="post">
                        <button class="btn btn-primary">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <!-- Repeat this structure for each row -->
            <!-- Add your table rows with data here -->
            <tr>
                <td>Category 2</td>
                <td class="text-end">
                    <!-- Add action buttons here -->
                    <form action="" method="post">
                        <button class="btn btn-primary">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <!-- Repeat this structure for each row -->
            <!-- Add your table rows with data here -->
            <tr>
                <td>Category 3</td>
                <td class="text-end">
                    <!-- Add action buttons here -->
                    <form action="" method="post">
                        <button class="btn btn-primary">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <!-- Repeat this structure for each row -->
            
            
        </tbody>
    </table>
</div>

@endsection
