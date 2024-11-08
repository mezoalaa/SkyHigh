<?php

namespace App\Http\Controllers;

use App\Models\SearchPlace;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Support\Str;

class placeController extends Controller
{

    // public function show($id)
    // {
    //     $item = Place::with('images')->findOrFail($id);

    //     return view('place', compact('item'));
    // }
    public function search(Request $request) {
        $search = $request->search;


        $data = Place::where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->with('images') // Ensure this is loading correctly
                ->get();

                    // dd($data);
                    return view('place', compact('data'));
        }





}

