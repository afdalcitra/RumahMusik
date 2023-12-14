@extends('layout.template')
@include('layout.adminNav')

@section('content')

<div class="container mt-3 pt-4">
    <div class="row">
        <div class="col-12 col-sm-8 col-md-12 m-auto">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <form action="" method="post">
                        <h1>Edit Categories</h1>
                        <p>Please fill out the form below to update the Category</p>
                        <label for="category" class="">Category</label>
                        <input type="text" name="" id="" class="form-control py-2 mb-4 mt-1" placeholder="Category Name" required>

                        <div class="text-center py-2 mb-3">
                            <button class="btn btn-primary">
                                Update Category
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
