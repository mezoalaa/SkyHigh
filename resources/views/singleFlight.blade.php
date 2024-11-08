@extends('layout.master')

@section('content')

{{-- <div class="flight-details">
    <h2>Flight Details</h2>
    <div class="flight-info">
        <div class="section">
            <p>New Delhi(DEL) - Mumbai(BOM)</p>
            <p>Economy | 1 Stop | 12h</p>
        </div>
        <div class="flight">
            <div class="route">
                <span>DEL 15:30</span>
                <span>LKO 17:40</span>
            </div>
            <p>Jet Airways JA-5201</p>
            <p>1h 5m, Lucknow Airport</p>
            <p>Cabin: 7 KG | Check-in: 15 KG</p>
        </div>
        <div class="flight">
            <div class="route">
                <span>LKO 17:40</span>
                <span>PAT 18:40</span>
            </div>
            <p>Jet Airways JA-5201</p>
            <p>1h 5m, Patna Airport</p>
            <p>Cabin: 7 KG | Check-in: 15 KG</p>
        </div>
        <div class="fare-summary">
            <h3>Fare Summary</h3>
            <div><span>Base Fare:</span><span>₹ 1600.00</span></div>
            <div><span>Taxes:</span><span>₹ 750.00</span></div>
            <div class="total"><strong>Total Payable Amount:</strong><strong>₹ 2250.00</strong></div>
        </div>
    </div>
    <button id="checkout-button" href="{{route('payment')}}">Checkout</button>
</div> --}}


<div class="flight-details-container">
    <h2>Flight Details</h2>
    <div class="flight-info">
        <div class="detail"><strong>Airline:</strong> <span>{{ $flight->Airline->name }}</span></div>
        <div class="detail"><strong>Flight Number:</strong> <span>{{ $flight->id }}</span></div>
        <div class="detail"><strong>From:</strong> <span>{{ $flight->location }} ({{ $flight->Airport->name }})</span></div>
        <div class="detail"><strong>To:</strong> <span>{{ $flight->destination }}</span></div>
        <div class="detail"><strong>Start Date:</strong> <span>{{ $flight->startDate->format('Y-m-d') }}</span></div>
        <div class="detail"><strong>End Date:</strong> <span>{{ $flight->endDate->format('Y-m-d') }}</span></div>
        <div class="detail"><strong>Price:</strong> <span>${{ number_format($flight->price, 2) }}</span></div>
    </div>


<!-- In your singlePackage.blade.php -->
<!-- In your singleFlight.blade.php -->

<a href="{{ route('flight.payment', ['id' => $flight->id]) }}" class="btn btn-primary">Proceed to Payment</a>
</div>
@endsection



