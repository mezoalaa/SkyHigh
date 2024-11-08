<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Flight;
use App\Models\reviews;
use Illuminate\Http\Request;
use App\Models\ManagePackage;
use App\Services\PackageService;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    private $packageServices;

    public function __construct(PackageService $packageServices)
    {
        // $this->middleware('auth')->except('index');
        $this->packageServices = $packageServices;
    }



    public function searchByCountry(Request $request)
{
    $country = $request->input('country');
    $startDate = $request->input('startDate');
    $endDate = $request->input('endDate');

    \Log::info("Search Parameters: ", [
        'country' => $country,
        'startDate' => $startDate,
        'endDate' => $endDate,
    ]);



    $packages = $this->packageServices->getPackagesByCountry($country, $startDate, $endDate);

    // dd($packages);
    return view('package', compact('packages'));
}





    public function getPackages(){
        return ManagePackage::with(['reservationPackage'])
            ->join('reservation_package', 'manage_package.reservation_id', '=', 'reservation_package.id')
            ->orderBy('reservation_package.price', 'asc') // Sorting by price ascending
            ->select('manage_package.*') // Make sure to select columns from manage_package only
            ->paginate(3);
    }


    public function index()
    {

        $package = $this->getPackages();
        // dd($package);
        $places = Place::orderBy('created_at', 'desc')->paginate(3);
        return view('welcome', compact('package','places'));

    }


    public function showDetail($id)
    {
        // $data = Place::where('id', $id)->with('images')->findOrFail($id);
        $data=Place::find($id);
        return view('singleplace', compact('data'));


    }

    public function Details($id)
    {
        try {
            // Fetch a single package based on ID
            $singlePackage = ManagePackage::with(['reservationPackage.hotel', 'reservationPackage.bus'])
                                        ->findOrFail($id);

            return view('singlePackage' , [
                'singlePackage' => $singlePackage
            ]);                             // This will throw an exception if not found


        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case where the package is not found
            return redirect()->route('some.route')->withError('Package not found.'); // Ensure you redirect to a valid route
        }
    }

    // public function showPlace()
    // {
    //     // Fetch the newest places, paginated with 3 per page
    //     $places = Place::orderBy('created_at', 'desc')->paginate(3);
    //     return view('welcome', compact('places'));
    // }
    // public function showDetail($id)
    // {
    //     $place = Place::findOrFail($id);
    //     return view('place', compact('place'));
    // }


    // public function search(Request $request) {
    //     $search = $request->search;


    //     $data = Place::where('name', 'like', "%{$search}%")
    //             ->orWhere('description', 'like', "%{$search}%")
    //             ->with('images') // Ensure this is loading correctly
    //             ->get()
    //             ->paginate(3);

    //                 dd($data);
    //                 return view('place', compact('data'));
    //     }


    // public function place()
    // {
    //     $places = Place::limit(6)->get(); // Fetching a sample of 6 places
    //     return view('welcome', compact('places'));
    // }

    // Method to show the detail of a place



}




















    // public function welcome()
    // {

    //     return view('welcome');
    // }


    // public function index()
    // {
    //     $packages = ManagePackage::with('reviews')
    //         ->whereHas('reviews', function ($query) {
    //             $query->select(DB::raw('AVG(star_rating) as average_rating'))
    //                   ->havingRaw('AVG(star_rating) = 5');
    //         })
    //         ->get();

    //     return view('welcome', compact('packages'));
    // }
    // public function index()
    // {
    //     // Fetch packages with an average rating of 5
    //     $packages = reviews::with(['ManagePackage'])
    //         ->whereHas('reviews', function ($query) {
    //             $query->havingRaw('AVG(star_rating) = 4');

    //         });
    //     dd($packages);

    //         // ->get();

    //     return view('packages.index', compact('packages'));
    // }
    // public function index()
    // {
    //     $packages = ManagePackage::with(['reviews'])
    //         ->whereHas('reviews', function ($query) {
    //             $query->select(DB::raw('AVG(star_rating) as avg_rating'))
    //                   ->groupBy('manage_id')
    //                   ->havingRaw('AVG(star_rating) >= 4');
    //         });

    //         // ->get();

    //     return view('welcome', compact('packages'));
    // }
