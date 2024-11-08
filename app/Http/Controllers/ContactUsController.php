<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ContactUsController extends Controller
{
    // Show the contact form
    public function create()
    {
        return view('contact');
    }

    // Handle the form submission
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Create a new contact message in the database
        ContactUs::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'user_id' => Auth::id(), // Associate the contact message with the logged-in user

        ]);

        return redirect()->back()->with('success', 'Thank you for your message!');
    }
}
