@extends('layout.template')
@include('layout.adminNav')

@section('content')

<div class="container mt-3 pt-2 mb-3 pb-3">
    <div class="row">
        <div class="col-12 col-sm-8 col-md-12 m-auto">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <form action="" method="post" onsubmit="return validateForm()">
                        <h1>Create New Instrument</h1>
                        <p>Please fill out the form below to create a new instrument!</p>
                        <label for="code" class="">Code</label>
                        <input type="text" name="" id="" class="form-control py-2 mb-4" placeholder="Instrument Code" required>
                        
                        <label for="name" class="">Name</label>
                        <input type="text" name="" id="" class="form-control py-2 mb-4" placeholder="Instrument Name" required>
                        
                        <label for="price" class="">Price</label>
                        <input type="number" name="" id="" class="form-control py-2 mb-3" placeholder="Instrument Price" required>

                        <div class="py-2 mb-3">
                            <label for="formFile" class="form-label">Images</label>
                            <input class="form-control" type="file" id="formFile" required accept=".jpg, .jpeg, .webp, .png">
                        </div>
                        
                        <div class="category-select-container">
                            <label for="category-select" class="">Category</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Category 1" id="category1" name="categories[]">
                                <label class="form-check-label" for="category1">
                                    Category 1
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Category 2" id="category2" name="categories[]">
                                <label class="form-check-label" for="category2">
                                    Category 2
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Category 3" id="category3" name="categories[]">
                                <label class="form-check-label" for="category3">
                                    Category 3
                                </label>
                            </div>
                        </div>

                        <div class="py-2 mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Instrument Description" required></textarea>
                        </div>

                        <div class="text-center py-2 mb-3">
                            <button class="btn btn-primary">
                                Create Instrument
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function validateForm() {
        // Get all checkboxes with the name "categories[]"
        var checkboxes = document.querySelectorAll('input[name="categories[]"]');
        
        // Check if at least one checkbox is checked
        var atLeastOneChecked = Array.prototype.slice.call(checkboxes).some(function(checkbox) {
            return checkbox.checked;
        });

        // Display an alert if no checkbox is checked
        if (!atLeastOneChecked) {
            alert("Please select at least one category.");
            return false; // Prevent form submission
        }

        // Continue with form submission if at least one checkbox is checked
        return true;
    }
</script>

@endsection
