

@extends('layout.master')
@section('content')

@foreach ($flights as $flight)
<div class="flight-details">
    <h2>{{ $flight->location }} - {{ $flight->destination }}</h2>
    <div>
        <p>{{ $flight->Airline->name }} to {{ $flight->Airport->name }}</p>
        <p>{{ $flight->date }}</p>
        <a class="btn btn-primary" href="{{ route('flight.show', $flight->id) }}">View Details</a>
    </div>
</div>
@endforeach


@endsection
{{-- @section('content')
<div class="flightCards">
    @foreach ($flights as $flight)
        <div class="w-100 upper-card d-flex justify-content-between align-items-center">
            <div class="l-upper d-flex justify-content-around align-items-center">
                <img style="width: 100px; height: 100px;" src="travel/images/pngegg.png" alt="Flight Image">
                <div>
                    <span style="color:black;">{{ $flight->airport->name }} - {{ $flight->airport->location }}</span>
                    <br>
                    <span style="color: var(--texted-color);">Line {{ $flight->id }}</span>
                </div>
            </div>
            <div class="m-upper">
                <div class="dropdown">
                    <button class="btn dropdown-toggle" style="border: 1px solid var(--texted-color);" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Arrival Airport
                    </button>
                    <ul class="dropdown-menu">
                        <!-- Dynamic items should be listed here -->
                    </ul>
                </div>
            </div>
            <div class="r-upper px-3">
                <a href="{{ route('singleFlight', ['id' => $flight->id]) }}" class="btn btn-outline-primary px-5">Details</a>
            </div>
        </div>
        <div class="w-100 lower-card d-flex justify-content-between align-items-center">
            <!-- Lower card content -->
        </div>
    @endforeach
</div> --}}
