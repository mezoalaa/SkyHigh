<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\FlightBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FlightBookingController extends Controller
{
    public function book(Request $request, $flightId)
    {
        $user = Auth::user();

        // Check if flight exists
        $flight = Flight::findOrFail($flightId);

        // Create the booking
        $booking = FlightBooking::create([
            'user_id' => $user->id,
            'flight_id' => $flight->id,
            'status' => 'confirmed', // or any default status
        ]);

        return redirect()->route('booking.confirmation', ['id' => $booking->id]);
    }

    public function confirmation($id)
    {
        $booking = FlightBooking::with(['user', 'flight.airline', 'flight.airport'])->findOrFail($id);
        return view('booking.confirmation', compact('booking'));
    }

}
