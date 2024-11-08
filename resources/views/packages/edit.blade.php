@extends('layouts.app')

@section('title', 'Edit Package')

@section('content')
<div class="container">
    <h1>Edit Package</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.Packages.update', $package->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $package->title) }}" required>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $package->reservationPackage->price) }}" required>
        </div>

        <div class="form-group">
            <label for="country">Country</label>
            <input type="text" class="form-control" id="country" name="country" value="{{ old('country', $package->reservationPackage->country) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $package->reservationPackage->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
            @if($package->reservationPackage->image)
                <small class="form-text text-muted">Current image: <a href="{{ asset('storage/' . $package->reservationPackage->image) }}" target="_blank">View</a></small>
            @endif
        </div>

        <input type="date" class="form-control" id="startDate" name="startDate"
        value="{{ old('startDate', optional(new \Carbon\Carbon($package->reservationPackage->startDate))->format('Y-m-d')) }}">


        <input type="date" class="form-control" id="endDate" name="endDate"
        value="{{ old('endDate', optional(new \Carbon\Carbon($package->reservationPackage->endDate))->format('Y-m-d')) }}">


        <!-- Hotel Data -->
        <div class="form-group">
            <label for="hotel_name">Hotel Name</label>
            <input type="text" class="form-control" id="hotel_name" name="hotel_name" value="{{ old('hotel_name', $package->reservationPackage->hotel->name ?? '') }}">
        </div>

        <div class="form-group">
            <label for="roomNo">Room Number</label>
            <input type="text" class="form-control" id="roomNo" name="roomNo" value="{{ old('roomNo', $package->reservationPackage->hotel->roomNo ?? '') }}">
        </div>

        <!-- Bus Data -->
        <div class="form-group">
            <label for="bus_date">Bus Date</label>
            <input type="datetime-local" class="form-control" id="bus_date" name="bus_date" value="{{ old('bus_date', optional($package->reservationPackage->bus)->date ? $package->reservationPackage->bus->date->format('Y-m-d\TH:i:s') : '') }}" step="1">
        </div>

        <div class="form-group">
            <label for="location">Bus Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $package->reservationPackage->bus->location ?? '') }}">
        </div>

        <div class="form-group">
            <label for="destination">Bus Destination</label>
            <input type="text" class="form-control" id="destination" name="destination" value="{{ old('destination', $package->reservationPackage->bus->destination ?? '') }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Package</button>
        <a href="{{ route('dashboard.Packages.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
