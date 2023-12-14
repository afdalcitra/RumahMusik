@extends('layout.template')
@include('layout.navbar')

@section('content')

<div class="entries-container pt-4 mt-4">
    <div class="button justify-content-center">
        <a class="btn btn-primary" href="{{ route('userCreatePage') }}" role="button">Create New User</a>
    </div>
    <div class="input-group mt-4">
        <div class="col-md-12">
            <form action="" method="post" class="d-flex">
                <input type="text" class="form-control form-search" placeholder="Search user name" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <button class="btn btn-primary py-2" type="submit" id="search-button">Search</button>
            </form>
        </div>
    </div>

    <!-- Table -->
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Username</th>
                <th>Role</th>
                <th>Email</th>
                <th class="text-end">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->is_admin ? 'Admin' : 'User' }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-end">
                        <!-- Add action buttons here -->
                        <a class="btn btn-primary" href="{{ route('userEditPage', ['id' => $user->id]) }}">Edit</a>
                        <a class="btn btn-danger" href="">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Display pagination links -->
    <div class="d-flex justify-content-between align-items-center mt-2 mb-2">
        <div>
            @if ($users->lastPage() > 1)
                <div class="pagination">
                    {{ $users->links('pagination') }}
                </div>
            @endif
        </div>
        <div>
            Showing {{ $users->firstItem() }} - {{ $users->lastItem() }} of {{ $users->total() }} results
        </div>
    </div>

</div>

@endsection
