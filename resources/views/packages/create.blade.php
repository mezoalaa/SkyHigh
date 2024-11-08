@extends('layouts.app')

@section('title', 'Create Package')




{{-- @section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Add New Package</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.Packages.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" required>
                <div class="invalid-feedback">Please provide a title.</div>
            </div>
            <div class="col-md-6">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Enter price" required>
                <div class="invalid-feedback">Please provide a price.</div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="country" class="form-label">Country</label>
                <input type="text" class="form-control" id="country" name="country" placeholder="Enter country" required>
            </div>

        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <div class="col-md-3">
                <label for="startDate" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="startDate" name="startDate">
            </div>
            <div class="col-md-3">
                <label for="endDate" class="form-label">End Date</label>
                <input type="date" class="form-control" id="endDate" name="endDate">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="hotel_name" class="form-label">Hotel Name</label>
                <input type="text" class="form-control" id="hotel_name" name="hotel_name" placeholder="Enter hotel name">
            </div>
            <div class="col-md-6">
                <label for="roomNo" class="form-label">Hotel Room Number</label>
                <input type="text" class="form-control" id="roomNo" name="roomNo" placeholder="Enter room number">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="location" class="form-label">Bus Location</label>
                <input type="text" class="form-control" id="bus_location" name="location" placeholder="Enter bus location">
            </div>
            <div class="col-md-6">
                <label for="destination" class="form-label">Bus Destination</label>
                <input type="text" class="form-control" id="destination" name="destination" placeholder="Enter bus destination">
            </div>
            <div class="col-md-3">
                <label for="bus_date" class="form-label">Bus Date</label>
                <input type="datetime-local" class="form-control" id="bus_date" name="bus_date">
            </div>
        </div>

        <div class="d-grid">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
</div>
@endsection --}}




@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Add New Package</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.Packages.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" required>
                <div class="invalid-feedback">Please provide a title.</div>
            </div>
            <div class="col-md-6">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Enter price" required>
                <div class="invalid-feedback">Please provide a price.</div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="country" class="form-label">Country</label>
                <input type="text" class="form-control" id="country" name="country" placeholder="Enter country" required>
                <div class="invalid-feedback">Please provide a country.</div>
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control dropify" id="image" name="image" multiple>
            </div>

            <div class="col-md-3">
                <label for="startDate" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="startDate" name="startDate">
            </div>
            <div class="col-md-3">
                <label for="endDate" class="form-label">End Date</label>
                <input type="date" class="form-control" id="endDate" name="endDate">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="hotel_name" class="form-label">Hotel Name</label>
                <input type="text" class="form-control" id="hotel_name" name="hotel_name" placeholder="Enter hotel name">
            </div>
            <div class="col-md-6">
                <label for="roomNo" class="form-label">Hotel Room Number</label>
                <input type="text" class="form-control" id="roomNo" name="roomNo" placeholder="Enter room number">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="location" class="form-label">Bus Location</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="Enter bus location">
            </div>
            <div class="col-md-6">
                <label for="destination" class="form-label">Bus Destination</label>
                <input type="text" class="form-control" id="destination" name="destination" placeholder="Enter bus destination">
            </div>
            <div class="col-md-3">
                <label for="bus_date" class="form-label">Bus Date</label>
                <input type="datetime-local" class="form-control" id="bus_date" name="bus_date">
            </div>
        </div>

        {{-- <div class="col-md-6">
            <label for="image" class="form-label">Package Pictures</label>
            <input type="file" id="image" class="form-control dropify"  name="image[]" multiple>

        </div> --}}

        <div class="d-grid">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
</div>
@endsection


{{-- @section('validation')
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form)) {
            }
        })
    })
</script> --}}

@push('scripts')
<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            Array.prototype.forEach.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
@endpush
