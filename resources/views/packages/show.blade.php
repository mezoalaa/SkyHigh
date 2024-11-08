@extends('layouts.app')

@section('title', 'Package Details')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title">{{ $package->title }}</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">

                            <h6><strong>ID:</strong> {{ $package->id }}</h6>
                            <h6><strong>Price:</strong> {{ optional($package->reservationPackage)->price }}</h6>
                            <h6><strong>Country:</strong> {{ optional($package->reservationPackage)->country }}</h6>
                            <h6><strong>Description:</strong> {{ optional($package->reservationPackage)->description }}</h6>
                            <h6><strong>Start Date:</strong> {{ optional($package->reservationPackage->startDate)->format('Y-m-d') }}</h6>
                            <h6><strong>End Date:</strong> {{ optional($package->reservationPackage->endDate)->format('Y-m-d') }}</h6>
                        </div>
                        <div class="col-md-6">
                            <h6><strong>Image:</strong></h6>
                            @if ($package->reservationPackage && $package->reservationPackage->image)
                                <img src="{{ asset(''. $package->reservationPackage->image) }}" alt="{{ $package->title }}" class="img-fluid mt-2">
                            @else
                                <p>No image available</p>
                            @endif
                        </div>
                        <!-- Hotel Information -->
                        <div class="col-md-6">
                            <h6><strong>Hotel Name:</strong> {{ $package->reservationPackage->hotel ? $package->reservationPackage->hotel->name : 'N/A' }}</h6>
                            <h6><strong>Room Number:</strong> {{ $package->reservationPackage->hotel ? $package->reservationPackage->hotel->roomNo : 'N/A' }}</h6>
                        </div>
                        <div class="col-md-6">
                            <h6><strong>Bus Date:</strong> {{ $package->reservationPackage->bus && $package->reservationPackage->bus->date ? $package->reservationPackage->bus->date->format('Y-m-d H:i:s') : 'N/A' }}</h6>
                            <h6><strong>Location:</strong> {{ $package->reservationPackage->bus ? $package->reservationPackage->bus->location : 'N/A' }}</h6>
                            <h6><strong>Destination:</strong> {{ $package->reservationPackage->bus ? $package->reservationPackage->bus->destination : 'N/A' }}</h6>

                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('dashboard.Packages.edit', $package->id) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('dashboard.Packages.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
