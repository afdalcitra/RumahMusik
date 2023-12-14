@extends('layout.template')
@include('layout.navbar')

@section('content')

<div class="container mt-3 pt-4">
    <div class="row">
        <div class="col-12 col-sm-8 col-md-12 m-auto">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <form action="{{ route('instrumentUpdate', ['id' => $instrument->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h1>Edit Instrument</h1>
                        <p>You can change the content of the form to update the instrument details</p>
                        <label for="code" class="">Code</label>
                        <input type="text" name="code" id="code" class="form-control py-2 mb-4" placeholder="Instrument Code" value="{{ $instrument->code }}" required>
                        
                        <label for="name" class="">Name</label>
                        <input type="text" name="name" id="name" class="form-control py-2 mb-4" placeholder="Instrument Name" value="{{ $instrument->name }}" required>
                        
                        <label for="price" class="">Price</label>
                        <input type="number" name="price" id="price" class="form-control py-2 mb-3" placeholder="Instrument Price" value="{{ $instrument->price }}" required>

                        <div class="py-2 mb-3">
                            <label for="formFile" class="form-label">Images</label>
                            <input class="form-control" type="file" id="formFile" name="images">
                        </div>
                        
                        <label for="category-select" class="">Category</label>
                        <select class="form-select py-2 mb-3" aria-label="Default select example">
                            <option selected value="1">Category 1</option>
                            <option value="2">Category 2</option>
                            <option value="3">Category 3</option>
                        </select>

                        <div class="py-2 mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <input type="text" name="description" id="description" class="form-control py-2 mb-3" placeholder="Instrument Description" value="{{ $instrument->description }}" required>
                        </div>

                        <div class="text-center py-2 mb-3">
                            <button class="btn btn-primary">
                                Update Instrument
                            </button>
                        </div>

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
