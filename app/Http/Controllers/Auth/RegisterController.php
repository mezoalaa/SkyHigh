<?php

namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session ;
use Illuminate\Support\Facades\Hash;


// class RegisterController extends Controller
// {


    // use RegistersUsers;


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // public function register(){
    //     return view('auth/register');
    // }
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }
    // protected function validator(array $data)
    // {
    //     // Validation rules
    //     $rules = [
    //         'firstname' => ['required', 'string', 'max:255'],
    //         'lastname' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ];

    //     // Perform validation
    //     $validator = Validator::make($data, $rules);

    //     // Return validation result
    //     return $validator;
    // }

    // protected function create(array $data)
    // {
    //     // Create the user if validation passes
    //     return User::create([
    //         'firstname' => $data['firstname'],
    //         'lastname' => $data['lastname'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }

    // public function register(Request $request)
    // {

    //     // Validate the incoming request
    //     $validator = $this->validator($request->all());

    //     // If validation fails, redirect back with errors
    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     // If validation passes, create the user
    //     $user = $this->create($request->all());

    //     // Redirect to the login page
    //     return redirect()->route('login');
    // }





        // Validator::make($request->all(), [
        //     'firstname' => 'required',
        //     'lastname' =>'required',
        //     'email' => 'required|email',
        //     'password' => 'required|confirmed'
        // ])->validate();

        // User::create([
        //     'firstname' => $request->firstname,
        //     'lastname' => $request->lastname, // Corrected field name
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);
        // return redirect()->route('login');


// }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'firstname' => $data['firstname'],
    //         'lastname' => $data['lastname'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    //     return redirect()->route('login');
    // }






//     class LoginnController extends Controller
//     {


//         public function index()
//         {
//             return view('login');
//         }


//         public function customLogin(Request $request)
//         {
//             $request->validate([
//                 'email' => 'required',
//                 'password' => 'required',
//             ]);

//             $credentials = $request->only('email', 'password');

//             // يتم تحقق من الاعتمادات وقيمة "تذكرني" في محاولة واحدة
//             if (Auth::attempt($credentials, $request->has('remember'))) {
//                 return redirect()->intended(route('home'))->withSuccess('Signed in');
//             }

//             // إذا فشلت محاولة تسجيل الدخول، يتم توجيه المستخدم إلى الصفحة الرئيسية مع رسالة نجاح
//             return redirect()->intended(route('home'))->with('success', 'Sign-in failed');
//         }
//         public function registration()
//         {
//             return view('register');
//         }


//         public function customRegistration(Request $request)
//         {
//             $request->validate([
//                 'firstname' => 'required',
//                 'lastname'=>'required',
//                 'email' => 'required|email|unique:users',
//                 'password' => 'required|min:6',
//             ]

//         );

//             $data = $request->all();
//             $check = $this->create($data);

//             return redirect('login')->with('success', 'Signed up successfully');
//         }


//         public function create(array $data)
//         {
//             return User::create([
//                 'firstname' => $data['name'],
//                 'lastname' => $data['lastname'],
//                 'email' => $data['email'],
//                 'password' => Hash::make($data['password']),
//             ]);
//         }

//         public function dashboard()
//         {
//             if (Auth::check()) {
//                 return redirect()->route('home');
//             }else{
//                 return redirect()->route('home')->with('success','are not allowed to access');
//             }


//         }

//         public function show (){
//             $users = User::all();
//             return view('index', compact('users'));
//         }


//         public function signOut()
//         {
//             Auth::logout();

//             return Redirect()->route('home')->with('success', 'congrats');
//         }
// }
