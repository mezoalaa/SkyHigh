<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ManagePackage;
use App\Services\PackageService;
use App\Http\Controllers\Controller;

class packageController extends Controller
{

    private $packageServices;

    public function __construct(PackageService $packageServices)
    {
        $this->packageServices = $packageServices;
    }

    public function index()
    {

        $packages = $this->packageServices->getMainPackages();
        // dd($package);
        return view('package', compact('packages'));
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
            // return redirect()->route('payment')->withError('Package not found.'); // Ensure you redirect to a valid route
        }
    }





}
