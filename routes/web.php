<?php

use App\Models\ManagePackage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\placeController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\packageController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FlightBookingController;
use App\Http\Controllers\Auth\LoginnController as AuthLoginnController;

// Route::get('index', function () {
//     return view('welcome');
// })->name('index');

// Route::view('/contact','contact')->name('Contact');
// Route::view('/book','book')->name('book');

// Route::view('/singleFlight','singleFlight')->name('singleFlight');


// // Route::view('test1','test1')->name('test');

// Route::controller(packageController::class)-> group(function(){
//     Route::get('/package','index')->name('package.index');


//     Route::get('/package/details/{id}', 'Details')->name('singlePackage');
// });

// Route::controller(placeController::class)-> group(function(){
//     Route::get('/place/search','index')->name('place.index');
//     Route::get('/search', 'search')->name('place.search');
// });

// Route::controller(PaypalController::class)-> group(function(){
//     Route::get('payment','payment')->name('payment')->middleware('auth');
//     Route::get('cancel', 'cancel')->name('payment.cancel');
//     Route::get('payment/success', 'success')->name('payment.success');

// });



// Route::controller(FlightController::class)-> group(function(){
//     Route::get('flight','index')->name('flight');
//     Route::get('/flights/search', 'search')->name('flights.search');

//     // Route::get('singleFlight','index')->name('singleFlight');
//     Route::get('/flights/{id}',  'show')->name('flight.show');


// });

// Route::controller(ContactUsController::class)-> group(function(){
//     Route::get('contact', 'create')->name('contact.create');
//     Route::post('contact', 'store')->name('contact.store');

// });



// Route::controller(HomeController::class)->group(function(){
//     Route::get('/home', 'index')->name('index');
//     Route::get('/packages/search',  'searchByCountry')->name('packages.searchByCountry');

//     // Route::get('/places', 'showPlace')->name('place.index');
//     // Route::get('/places/{id}', 'showDetail')->name('place.show');
// });

// Route::post('/logout', [LoginController::class, 'destroy'])
//     ->name('logout');






// Route::controller(LoginController::class)-> group(function(){

//         // login  users
//     route::get ('login','index')->name('login');
//     route::post ('custom-login','customLogin')->name('login.custom');

//         // register users
//     route::get ('registration','registration')->name('register');
//     route::post ('custom-registration','customRegistration')->name('register.custom');
//     route::get ('signout','signOut')->middleware('auth')->name('signout');
//     route::get ('admin/users','show')->name('users.show');
// });

// Route::middleware(['auth'])->group(function(){

//     // Route::get('/profile', [LoginController::class,'profile'])->name('profile');
// }); // Add a semicolon here to terminate the statement


Route::middleware(['web'])->group(function () {
    // Public routes
    Route::view('/contact','contact')->name('Contact');
    Route::view('/book','book')->name('book');
    Route::view('/singleFlight','singleFlight')->name('singleFlight');

    // Package routes
    Route::controller(PackageController::class)->group(function(){
        Route::get('/package','index')->name('package.index');
        Route::get('/package/details/{id}', 'Details')->name('singlePackage');
    });

    // Place routes
    Route::controller(PlaceController::class)->group(function(){
        Route::get('/place/search','index')->name('place.index');
        Route::get('/search', 'search')->name('place.search');
    });

    // PayPal and payment routes
    Route::controller(PaypalController::class)->group(function(){
        Route::get('package/payment/{id}', 'payment')->name('package.payment')->middleware('auth');
        // In your web.php file
        Route::get('/flight/payment/{id}', 'flightPayment')->name('flight.payment')->middleware('auth');

        Route::get('cancel', 'cancel')->name('payment.cancel');
        Route::get('/payment/success',  'success')->name('payment.success');
        Route::get('/payment/confirmation', function() {
            return view('payment.confirmation');
    })->name('payment.confirmation');
    });

    Route::get('/booking/confirmation/{id}', 'FlightBookingController@confirmation')->name('booking.confirmation');
    Route::get('/payment/success',  'FlightBookingController@success')->name('payment.success');


    // Flight routes
    Route::controller(FlightController::class)->group(function(){
        Route::get('flight','index')->name('flight');
        Route::get('/flights/search', 'search')->name('flights.search');
        Route::get('/flights/{id}', 'show')->name('flight.show');
    });

    // ContactUs routes
    Route::controller(ContactUsController::class)->group(function(){
        Route::get('contact', 'create')->name('contact.create');
        Route::post('contact', 'store')->name('contact.store');
    });

    // Home routes
    Route::controller(HomeController::class)->group(function(){
        Route::get('/home', 'index')->name('index');
        Route::get('/packages/search', 'searchByCountry')->name('packages.searchByCountry');
        Route::get('/place/{id}', 'showDetail')->name('place.detail');

    });

    // Authentication routes
    Route::controller(LoginController::class)->group(function(){
        Route::get('login','index')->name('login');
        Route::post('custom-login','customLogin')->name('login.custom');
        Route::get('registration','registration')->name('register');
        Route::post('custom-registration','customRegistration')->name('register.custom');
        Route::get('signout','logout')->middleware('auth')->name('signout');
        Route::get('admin/users','show')->name('users.show');
        Route::get('dashboard', 'showDashboard')->name('dashboard')->middleware('auth');

    });

    Route::post('/flights/{flight}/book', [FlightBookingController::class, 'book'])->name('flights.book');
    Route::get('/booking/{id}/confirmation', [FlightBookingController::class, 'confirmation'])->name('booking.confirmation');


    Route::get('places', [HomeController::class, 'showPlace'])->name('places');
    Route::get('places/{id}', [HomeController::class, 'showDetail'])->name('places.show');
    // Logout route
    // Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

    // Protected routes that require authentication
    Route::middleware(['auth'])->group(function(){
        // Add your authenticated routes here
    });
});





Route::get('/debug-session', function () {
    dd(session()->all());
});







