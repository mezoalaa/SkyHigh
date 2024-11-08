<?php

// namespace App\Http\Controllers;

// use App\Models\travelAgency;
// use App\Models\UserAddress;
// use Illuminate\Http\Request;

// class TravelAgencyController extends Controller
// {
//     // public function show($id)
//     // {
//     //     $user = travelAgency::findOrFail($id);
//     //     $address = $user->UserAddress; // Assuming the address relationship method is called 'address'
//     //     dd($user, $address);

//     //     // return view('user.show', compact('user', 'address'));
//     // }


//     // Display a listing of travel agencies
//     public function index()
//     {
//         // $travelAgencies = TravelAgency::with(['images', 'managePackages'])->get();
//         // dd($travelAgencies);
//         // return response()->json($travelAgencies);
//         return view('packages.indexPage');
//     }

//     // Show the form for creating a new travel agency
//     public function create()
//     {
//         // Return a view or API resource for creating a travel agency
//     }

//     // Store a newly created travel agency in storage
//     public function store(Request $request)
//     {
//         $travelAgency = TravelAgency::create($request->all());
//         return response()->json($travelAgency, 201);
//     }

//     // Display the specified travel agency
//     public function show($id)
//     {
//         $travelAgency = TravelAgency::with(['images', 'managePackages'])->findOrFail($id);
//         return response()->json($travelAgency);
//     }

//     // Show the form for editing the specified travel agency
//     public function edit($id)
//     {
//         // Return a view or API resource for editing a travel agency
//     }

//     // Update the specified travel agency in storage
//     public function update(Request $request, $id)
//     {
//         $travelAgency = TravelAgency::findOrFail($id);
//         $travelAgency->update($request->all());
//         return response()->json($travelAgency, 200);
//     }

//     // Remove the specified travel agency from storage
//     public function destroy($id)
//     {
//         TravelAgency::destroy($id);
//         return response()->json(null, 204);
//     }
// }


