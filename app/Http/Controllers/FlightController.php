<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Airline;
use App\Models\Airport;
use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index()
    {
        $flights = Flight::with(['Airline', 'Airport'])->get();
        return view('test', compact('flights'));
    }

    public function show($id)
    {
        // Fetch the flight along with related Airline and Airport data
        $flight = Flight::with(['Airline', 'Airport'])->findOrFail($id);
        return view('singleFlight', compact('flight'));
    }




    // public function search(Request $request) {
    //     $search = $request->search;

    //     // Assuming 'departure_date' is the field you want to search in addition to 'name'
    //     $data = Flight::where(function($query) use ($search) {
    //                 $query->where('name', 'like', "%{$search}%")
    //                       ->orWhere('departure_date', 'like', "%{$search}%");
    //             })
    //             ->get();

    //     return view('test', compact('data')); // Ensure this view is correct for displaying the results
    // }

    public function search(Request $request) {
        // Extract all search parameters
        $from = $request->from;
        $to = $request->to;
        $dateStart = $request->date_start;
        $dateEnd = $request->date_end;
        $class = $request->class;


        // Query database based on the provided parameters
        // $flights = Flight::query()
        //     ->when($from, function ($query) use ($from) {
        //         return $query->where('location', 'like', "%{$from}%");
        //     })
        //     ->when($to, function ($query) use ($to) {
        //         return $query->where('destination', 'like', "%{$to}%");
        //     })
        //     ->when($dateStart && $dateEnd, function ($query) use ($dateStart, $dateEnd) {
        //         // If both start and end dates are specified, filter between these dates
        //         return $query->whereBetween('startDate', [$dateStart, $dateEnd]);
        //     })
        //     ->when($dateStart && !$dateEnd, function ($query) use ($dateStart) {
        //         // If only start date is given, filter from this date onwards
        //         return $query->where('startDate', '>=', $dateStart);
        //     })
        //     ->when(!$dateStart && $dateEnd, function ($query) use ($dateEnd) {
        //         // If only end date is given, filter up to this date
        //         return $query->where('endDate', '<=', $dateEnd);
        //     })


        $flights = Flight::query()
            ->when($from, function ($query) use ($from) {
                return $query->where('location', 'like', "%{$from}%");
            })
            ->when($to, function ($query) use ($to) {
                return $query->where('destination', 'like', "%{$to}%");
            })
            ->whereBetween('startDate', ['2024-05-01', '2024-10-31'])
        ->get();
        // dd($flights);




        // Return view with the search results
        return view('test', compact('flights'));
    }



}
