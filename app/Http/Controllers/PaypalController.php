<?php
namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
use App\Models\ManagePackage;
use Srmklive\PayPal\Services\ExpressCheckout;


// class PaypalController extends Controller
// {

//     public function payment($id)
//     {
//         if (!auth()->check()) {
//             return redirect()->route('login')->with('error', 'Please log in to continue to payment.');
//         }

//       try {
//         // Fetch the package details including price and description
//             $package = ManagePackage::with(['reservationPackage'])->findOrFail($id);

//             $data = [];
//             $data['items'] = [
//                 [
//                     'name' => $package->reservationPackage->title, // Assuming the title is the name of the package
//                     'price' => $package->reservationPackage->price, // Price from reservation package
//                     'desc' => $package->reservationPackage->description, // Description from reservation package
//                 ]
//             ];

//             $data['invoice_id'] = $id; // Use package ID as invoice ID
//             $data['invoice_description'] = "Order #{$id} Invoice";
//             $data['return_url'] = url('/payment/success');
//             $data['cancel_url'] = url('/payment/cancel');
//             $data['total'] = $package->reservationPackage->price; // Total price

//             $provider = new ExpressCheckout; // Assuming you are using a specific package or service for PayPal
//             $response = $provider->setExpressCheckout($data);

//             return redirect($response['paypal_link']); // Redirect to PayPal payment page
//         } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
//             return back()->withErrors('Requested package not found.');
//             session(['transaction_type' => 'package']); // or 'package' based on the context

//         }
//     }

//     public function flightPayment($id)
// {
//     if (!auth()->check()) {
//         return redirect()->route('login')->with('error', 'Please log in to continue to payment.');
//     }

//     try {
//         // Fetch the flight details along with the related Airline and Airport information
//         $flight = Flight::with(['Airport', 'Airline'])
//                         ->findOrFail($id);

//         $data = [];
//         $data['items'] = [
//             [
//                 'name' => "Flight to " . $flight->Airport->name,
//                 'price' => $flight->price,
//                 'desc' => "Flight from " . $flight->Airport->name . " to " . $flight->Airport->name,
//             ]
//         ];

//         $data['invoice_id'] = $id;
//         $data['invoice_description'] = "Order #{$id} for Flight Invoice";
//         $data['return_url'] = url('/payment/success');
//         $data['cancel_url'] = url('/payment/cancel');
//         $data['total'] = $flight->price; // Total cost of the flight

//         $provider = new ExpressCheckout; // Assuming you are using a specific package or service for PayPal
//         $response = $provider->setExpressCheckout($data);

//         return redirect($response['paypal_link']); // Redirect to PayPal payment page
//     } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
//         return back()->withErrors('Requested flight not found.');
//     }
//     session(['transaction_type' => 'flight']); // or 'package' based on the context

// }



//     public function cancel()
//     {
//         return redirect()->route('index')->with('error', 'Payment was canceled.');
//     }


//     public function success(Request $request)
// {
//     $provider = new ExpressCheckout;
//     $response = $provider->getExpressCheckoutDetails($request->token);

//     if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
//         // Check the type of transaction from response or from session
//         $transactionType = session('transaction_type');  // Assume you set this during the setExpressCheckout

//         // Implement your database logic here based on successful payment
//         // Example: Saving transaction details, updating order status, etc.

//         // Redirect based on transaction type
//         if ($transactionType === 'flight') {
//             // Specific logic for flights
//             // Example: update flight booking status, send confirmation email, etc.
//         } elseif ($transactionType === 'package') {
//             // Specific logic for packages
//             // Example: update package booking status, send package details, etc.
//         }

//         return redirect()->route('index'); // Correct redirection to the homepage or dashboard
//     }
//     return response()->json('Payment Failed', 402); // Consider returning to a dedicated error page or a retry option
// }


// }

class PaypalController extends Controller
{
    // public function packagepayment($id)
    public function payment($id)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please log in to continue to payment.');
        }

        try {
            $package = ManagePackage::with('reservationPackage')->findOrFail($id);
            $data = [
                'items' => [
                    [
                        'name' => $package->reservationPackage->title,
                        'price' => $package->reservationPackage->price,
                        'desc' => $package->reservationPackage->description,
                    ]
                ],
                'invoice_id' => $id,
                'invoice_description' => "Order #{$id} Invoice",
                'return_url' => url('/payment/success'),
                'cancel_url' => url('/payment/cancel'),
                'total' => $package->reservationPackage->price,
            ];

            session(['transaction_type' => 'package']);
            $provider = new ExpressCheckout;
            $response = $provider->setExpressCheckout($data);

            dd($response);

            if (isset($response['paypal_link'])) {
                return redirect($response['paypal_link']);
            } else {
                \Log::error('PayPal response is missing the expected redirect link.', ['response' => $response]);
                return back()->withErrors('Unexpected response from payment gateway.');
            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->withErrors('Requested package not found.');
        } catch (\Exception $e) {
            \Log::error('An error occurred during payment setup: ' . $e->getMessage());
            return back()->withErrors('An error occurred: ' . $e->getMessage());
        }
    }





    //
    public function flightPayment($id)
{
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'Please log in to continue to payment.');
    }

    try {
        $flight = Flight::with(['Airport', 'Airline'])->findOrFail($id);

        $data = [
            'items' => [
                [
                    'name' => "Flight to " . $flight->Airport->name,
                    'price' => $flight->price,
                    'desc' => "Flight from " . $flight->location . " to " . $flight->destination,
                ]
            ],
            'invoice_id' => $id,
            'invoice_description' => "Order #{$id} for Flight Invoice",
            'return_url' => url('/payment/success'),
            'cancel_url' => url('/payment/cancel'),
            'total' => $flight->price,
        ];

        session(['transaction_type' => 'flight']);
        $provider = new ExpressCheckout;
        $response = $provider->setExpressCheckout($data);

        return redirect($response['paypal_link']);
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return back()->withErrors('Requested flight not found.');
    }
}


    public function cancelflight()
    {
        return redirect()->route('singleFlight')->with('error', 'Payment was canceled.');
    }
    public function cancelpackage()
    {
        return redirect()->route('singlePackage')->with('error', 'Payment was canceled.');
    }



    public function handlePayment(Request $request)
    {
        $paymentResult = $this->processPayment($request);

        if ($paymentResult->isSuccessful()) {
            return redirect()->route('payment.success'); // Correct usage
        }

        return redirect()->route('payment.failure'); // Correct usage
    }

    public function success(Request $request)
{
    $provider = new ExpressCheckout;
    $response = $provider->getExpressCheckoutDetails($request->token);

    Log::info('PayPal Success Response:', ['response' => $response]);

    if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
        // Determine transaction type from session
        $transactionType = session('transaction_type');
        session()->forget('transaction_type');  // Clear the session value after use

        // Implement your logic based on transaction type
        if ($transactionType === 'flight') {
            // Implement flight-specific success logic
            // Example: Update booking, send confirmation, etc.
        } elseif ($transactionType === 'package') {
            // Implement package-specific success logic
            // Example: Update booking, send itinerary, etc.
        }

        // Redirect to a confirmation page with success message
        return redirect()->route('payment.confirmation')->with('success', 'Payment completed successfully');
    }

    // Redirect to the index page with error message
    return redirect()->route('index')->with('error', 'Payment failed or was cancelled');
}


}



// }


// Routes should be defined in routes/web.php

    // public function success(Request $request)
    // {
    //     $provider = new ExpressCheckout;
    //     $response = $provider->getExpressCheckoutDetails($request->token);

    //     if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
    //         // Implement your database logic here based on successful payment
    //         return redirect()->route('index');  // Correct redirection
    //     }
    //     return response()->json('Payment Failed', 402);
    // }



    //     public function success(Request $request)
// {
//     $provider = new ExpressCheckout;
//     $response = $provider->getExpressCheckoutDetails($request->token);
//     return redirect()->route('index')->with('success', 'Payment completed successfully');


//     // Log the full response to debug
//     Log::info('PayPal Success Response:', ['response' => $response]);

//     if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
//         $transactionType = session('transaction_type');
//         session()->forget('transaction_type');

//         // Implement your logic based on transaction type
//         if ($transactionType === 'flight') {
//             // Implement flight-specific success logic
//         } elseif ($transactionType === 'package') {
//             // Implement package-specific success logic
//         }

//         return redirect()->route('index')->with('success', 'Payment completed successfully');
//     }

//     return redirect()->route('singlePackage')->with('error', 'Payment failed or was cancelled.');
// } -->



// class PaypalController extends Controller{

// public function payment()
// {
//     if (!auth()->check()) {
//         return redirect()->route('login')->with('error', 'Please log in to continue to payment.');
//     }
//     $data = [];
//     $data['items'] = [
//         [
//         'name' => 'Name',
//         'price' => 100,
//         'qty' => 1,
//         'desc' => 'Description',
//         ]
//     ];
//     $data['invoice_id'] = 1;
//     $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
//     $data['return_url'] = url('/payment/success');
//     $data['cancel_url'] = url('/cancel');
//     $data['total'] = 100;

//     $provider = new ExpressCheckout;
//     $response = $provider->setExpressCheckout($data);
//     //  dd($response);
//     return redirect($response['paypal_link']);
// }

// // public function cancel()
// // {
// //     return response()->json('Payment Canceled', 402);
// //     return redirect()->route('index');
// // }
// public function cancel()
// {
//     return redirect()->route('index')->with('error', 'Payment was canceled.');
// }

// // public function success(Request $request)
// // {
// //     $provider = new ExpressCheckout;
// //     $response = $provider->getExpressCheckoutDetails($request->token);

// //     if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
// //         // Implement your database logic here based on successful payment
// //         return redirect()->route('booking.confirmation')->with('success', 'Payment completed successfully');
// // }
// //     return response()->json('Payment Failed', 402);
// // public function success(Request $request)
// // {
// //     $provider = new ExpressCheckout;
// //     $response = $provider->getExpressCheckoutDetails($request->token);

// //     if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
// //         // Implement your database logic here based on successful payment.
// //         // Assuming you have the booking ID stored in the session or can retrieve it here.
// //         $bookingId = $request->session()->get('booking_id', null);

// //         if ($bookingId) {
// //             // Clear the booking ID from the session if it's no longer needed.
// //             $request->session()->forget('booking_id');

// //             return redirect()->route('booking.confirmation', ['id' => $bookingId])
// //                              ->with('success', 'Payment completed successfully');
// //         } else {
// //             // Log error or handle cases where booking ID is missing
// //             \Log::error('Booking ID missing after successful payment', ['request' => $request->all()]);
// //             return redirect()->route('index')->with('error', 'Error processing your booking.');
// //         }
// //     }

// //     // Log this error as a critical issue, payment was not successful.
// //     \Log::critical('Payment failed', ['response' => $response, 'request' => $request->all()]);
// //     return redirect()->route('index')->with('error', 'Payment failed, please try again.');
// // }

// }

