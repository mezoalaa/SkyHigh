@extends('layout.master')

@section('content')
<div class="container">
    <h2>Booking Confirmation</h2>
    @if(isset($booking))
        <p>Thank you for booking with us, {{ $booking->user->firstname }} {{ $booking->user->lastname }}!</p>
        <p>Flight Details:</p>
        <ul>
            <li>Flight ID: {{ $booking->flight->id }}</li>
            <li>Price: ${{ $booking->flight->price }}</li>
            <li>Start Date: {{ $booking->flight->startDate }}</li>
            <li>End Date: {{ $booking->flight->endDate }}</li>
            <li>Location: {{ $booking->flight->location }}</li>
            <li>Destination: {{ $booking->flight->destination }}</li>
            <li>Airline: {{ $booking->flight->airline->name }}</li>
            <li>Airport: {{ $booking->flight->airport->name }}</li>
        </ul>
    @else
        <p>Booking information is not available.</p>
    @endif
</div>
@endsection
