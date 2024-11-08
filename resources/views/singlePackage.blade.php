@extends('layout.master')

@section('title', 'Book Package')

@section('content')
<div id="fh5co-tours" class="fh5co-section-gray">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Travel Packages</h1>
                <div class="slider-wrapper">
                    <div class="slider">
                        <div class="slide package-container" style="display: flex; align-items: center;"> <!-- Ensure alignment -->
                            <img class="package-image" src="{{ asset('' . $singlePackage->reservationPackage->image) }}" alt="Image of {{ $singlePackage->reservationPackage->title }}" style="flex: 1 1 50%; height: auto;">

                            <div class="desc blog-text" style="flex: 1 1 50%; padding: 20px;"> <!-- Balance space allocation -->
                                <h2>Name of Package: {{ $singlePackage->reservationPackage->title }}</h2>
                                <h3>Country: {{ $singlePackage->reservationPackage->country }}</h3>
                                <p>{{ $singlePackage->description }}</p>
                                <span class="price">Price:${{ $singlePackage->reservationPackage->price }}</span>
                                <br>

                                <div class="additional-info">
                                    <p><strong>Start Date:</strong> {{ $singlePackage->reservationPackage->startDate }}</p>
                                    <p><strong>End Date:</strong> {{ $singlePackage->reservationPackage->endDate }}</p>
                                    <p><strong>Hotel Name:</strong> {{ $singlePackage->reservationPackage->hotel->name }}</p>
                                    <p><strong>Room Number:</strong> {{ $singlePackage->reservationPackage->hotel->roomNo }}</p>
                                    <p><strong>Bus Date:</strong> {{ $singlePackage->reservationPackage->bus->date }}</p>
                                    <p><strong>Bus Location:</strong> {{ $singlePackage->reservationPackage->bus->location }}</p>
                                    <p><strong>Bus Destination:</strong> {{ $singlePackage->reservationPackage->bus->destination }}</p>
                                </div>

<!-- In your singlePackage.blade.php -->
                                <a href="{{ route('package.payment', ['id' => $singlePackage->id]) }}" class="btn btn-primary">Proceed to Payment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



