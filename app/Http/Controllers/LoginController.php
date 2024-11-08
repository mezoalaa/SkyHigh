<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended('/defaultpath');
    }

    public function index()
    {
        return view('auth/login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $user = Auth::user();

            // Check if the user has a profile, and create one if it doesn't exist
            if (!$user->profile) {
                Profile::create([
                    'user_id' => $user->id,
                    // Add any other default profile fields here
                ]);
            }

            if ($user->type == 'travel-agency') {
                return redirect()->route('dashboard');
            }

            return redirect()->intended(route('index'))->withSuccess('Signed in');
        }

        return redirect()->route('login')->withErrors(['login' => 'The provided credentials do not match our records.']);
    }

    public function registration()
    {
        return view('auth/register');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'type' => 'required',
        ]);

        $user = User::create([
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'type' => $request['type'],
        ]);

        Auth::login($user);

        // Create a profile for the new user
        Profile::create([
            'user_id' => $user->id,
            // Add any other default profile fields here
        ]);

        if ($user->type == 'travel-agency') {
            return redirect()->route('dashboard');
        }

        return redirect()->route('index')->with('success', 'Signed up and logged in successfully');
    }

    public function show()
    {
        $users = User::all();
        return view('index', compact('users'));
    }

    // public function showDashboard()
    // {
    //     if (auth()->user()->type == 'travel-agency') {
    //         $settings = auth()->user()->profile;
    //         if (!$settings) {
    //             return redirect()->back()->with('error', 'No profile found for this agency.');
    //         }
    //         return view('dashboard', compact('settings'));
    //     } else {
    //         return redirect()->back()->with('error', 'Unauthorized access.');
    //     }
    // }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

    public function profile()
    {
        return view('profile');
    }

    public function redirectTo()
    {
        if (auth()->user()->type == 'travel-agency') {
            return redirect()->route('dashboard.index');
        } else {
            return redirect()->route('index');
        }
    }
}
