<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Bus;
use PackageServices;
use App\Models\Hotel;
use App\Utils\ImageUploud;
use Illuminate\Http\Request;
use App\Models\ManagePackage;
use App\Models\Bus as ModelsBus;
use App\Services\PackageService;
use App\Models\ReservationPackage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Contracts\DataTable;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Http\Requests\dashboard\Packages\PackageDelete;
use App\Services\PackageServices as ServicesPackageServices;
use App\Http\Requests\dashboard\Packages\PackageDeleteRequest;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $packageServices;

    public function __construct(PackageService $packageServices)
    {
        $this->packageServices = $packageServices;
    }

    public function index()
    {
        if (Auth::user()->type !== 'travel-agency') {
            return redirect()->route('index')->withErrors('Unauthorized access.');
        }

        // $mainPackages = $this->packageServices->getMainPackages(); // Ensure this method is user-specific if needed
        $authUser = Auth::user()->id;
        $mainPackages = $this->packageServices->getMainPackages($authUser); // Fetch packages for the authenticated user

        return view('packages.indexPage', compact('mainPackages', 'authUser'));
    }




    public function getall(){
        $Auth= Auth::user()->id;
        $pak= ManagePackage::get();
        if ($Auth==$pak->user_id) {
            return $pak;

        }

        $data = ManagePackage::with('reservationPackage');
        return datatables($data,$pak)->make(false);
    }

    public function ajax_search(Request $request) {
        if ($request->ajax()) {
            $search_by_text = $request->search_by_text;
            $mainPackages = ReservationPackage::where('title', 'LIKE', "%{$search_by_text}%")
                                ->orderBy('id', 'DESC')
                                ->paginate(10);

            // Return the view with the correct variable name 'mainPackages'
            return view('packages.ajax_search', compact('mainPackages'));
        }
    }








    public function create()
    {
        return view('packages.create');

    }



    public function store(Request $request)
    {
        \Log::info("Starting transaction");

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'country' => 'required|string|max:255',
            'description' => 'nullable|string',
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
            'image' => 'nullable|image',
            'hotel_name' => 'required|string|max:255',
            'roomNo' => 'required|string|max:100',
            'bus_date' => 'required|date',
            'location' => 'required|string|max:255',
            'destination' => 'required|string|max:255'
        ]);

        DB::beginTransaction();
        try {
            \Log::info("Creating hotel");
            $hotel = new Hotel([
                'name' => $request->hotel_name,
                'roomNo' => $request->roomNo
            ]);
            $hotel->save();

            \Log::info("Creating bus");
            $bus = new Bus([
                'date' => $request->bus_date,
                'location' => $request->location,
                'destination' => $request->destination
            ]);
            $bus->save();

            \Log::info("Creating reservation package");
            $reservationData = array_merge($validated, [
                'hotel_reservation_ID' => $hotel->id,
                'bus_reservationID' => $bus->id
            ]);

            $reservationPackage = ReservationPackage::create($reservationData);

            if ($request->hasFile('image')) {
                \Log::info("Uploading image");
                $imagePath = ImageUploud::uploudImage($request->file('image'),227 , 151, 'images/');
                $reservationPackage->update(['image' => $imagePath]);
            }

            \Log::info("Linking user");
            ManagePackage::create([
                'reservation_id' => $reservationPackage->id,
                'user_id' => auth()->id(),
            ]);

            DB::commit();
            \Log::info("Transaction successful");
            return redirect()->route('dashboard.Packages.index')->with('success', 'Package created successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            \Log::error("Error during package creation: " . $e->getMessage());
            return back()->withErrors('Error creating the package: ' . $e->getMessage());
        }
    }






    public function show($id)
    {

        $package = ManagePackage::with('reservationPackage.hotel', 'reservationPackage.bus')
                    ->findOrFail($id);

        // dd($package);  // This will dump the package details to the browser

        return view('packages.show', compact('package'));
    }





    public function someMethod($id) {
        $package = ManagePackage::with(['reservationPackage.bus'])->findOrFail($id);

        // Check if the reservationPackage and bus are not null before attempting to access the date
        if ($package->reservationPackage && $package->reservationPackage->bus && $package->reservationPackage->bus->date) {
            $busDate = $package->reservationPackage->bus->date->format('Y-m-d H:i:s');
        } else {
            $busDate = 'N/A';
        }

        // Return a view or a response with the bus date
        return view('some.view', compact('busDate')); // Assuming 'some.view' is the correct view file that needs this data
    }





    public function edit($id) {
        $package = ManagePackage::with('reservationPackage')->findOrFail($id);
        return view('packages.edit', compact('package'));
    }






    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'country' => 'required|string|max:255',
            'description' => 'nullable|string',
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
        // Hotel and bus data validation
            'hotel_name' => 'required|string|max:255',
            'roomNo' => 'required|string|max:100',
            'bus_date' => 'required|date',
            'location' => 'required|string|max:255',
            'destination' => 'required|string|max:255'
        ]);

    // Fetch the package with its associated reservationPackage, hotel, and bus
        $package = ManagePackage::with(['reservationPackage.hotel', 'reservationPackage.bus'])->findOrFail($id);

    // Start transaction
        try {
        // Update associated ReservationPackage
            $package->reservationPackage->update([
                'title' => $request->title,
                'price' => $request->price,
                'country' => $request->country,
                'description' => $request->description,
                'startDate' => $request->startDate,
                'endDate' => $request->endDate,
            ]);

        // Check if hotel exists, then update
            if ($package->reservationPackage->hotel) {
                $updatedHotel = $package->reservationPackage->hotel->update([
                    'name' => $request->hotel_name,
                    'roomNo' => $request->roomNo,
                ]);
                 // Debug statement to check if hotel is updated
            }

        // Check if bus exists, then update
            if ($package->reservationPackage->bus) {
                $updatedBus = $package->reservationPackage->bus->update([
                    'date' => $request->bus_date,
                    'location' => $request->location,
                    'destination' => $request->destination,
                ]);
                 // Debug statement to check if bus is updated
            }
        // Commit transaction
            DB::commit();
            return redirect()->route('dashboard.Packages.index')->with('success', 'Package updated successfully');
        } catch (\Exception $e) {
        // Rollback transaction if anything goes wrong
            DB::rollback();
            return back()->withErrors('Failed to update the package: ' . $e->getMessage());
        }
    }






    public function delete($id, Request $request) {
        // Find and delete the Bus by id
        $managePackage = ManagePackage::find($id);
        if ($managePackage) {
            if ($managePackage->delete()) {
                $reservationPackage = ReservationPackage::where('id',$managePackage->reservation_id)->first();
                if ($reservationPackage) {
                    $reservationPackage->delete();
                }
                $hotel = Hotel::where('id',$reservationPackage->hotel_reservation_ID)->first();
                $bus = Bus::where('id',$reservationPackage->bus_reservationID)->first();
                if ($hotel && $bus && !empty($reservationPackage))  {
                    $hotel->delete();
                    $bus->delete();
                }
            }else{
                return redirect()->route('dashboard.Packages.index')->with('error', 'Failed to delete ManagePackage.');
            }

            return redirect()->route('dashboard.Packages.index')->with('success', 'Package deleted successfully.');
        }
        dd($request->all(),$id,$managePackage);

        return redirect()->route('dashboard.Packages.index')->with('error', 'Package not found.');
    }
















    // public function delete($id, PackageDeleteRequest $request) {
    //     // Assuming 'reservation_id' is the correct column you wish to match against
    //     $deletedRows = ManagePackage::where('reservation_id', $id)->delete();

    //     // Check if rows were deleted, this is optional but useful for feedback
    //     if ($deletedRows > 0) {
    //         return redirect()->route('dashboard.packages.index')->with('success', 'Package deleted successfully.');
    //     } else {
    //         return redirect()->route('dashboard.packages.index')->with('error', 'No package found to delete.');
    //     }
    // }






    // public function delete($id)
    // {
    //     DB::beginTransaction();

    //     try {
    //         $reservationPackage = ReservationPackage::findOrFail($id);

    //         // Delete related manage packages, buses, and hotels
    //         ManagePackage::where('reservation_id', $reservationPackage->id)->delete();
    //         Bus::where('bus_reservationID', $reservationPackage->id)->delete();
    //         Hotel::where('hotel_reservation_ID', $reservationPackage->id)->delete();

    //         // Finally delete the reservation package itself
    //         $reservationPackage->delete();

    //         DB::commit();
    //         return redirect()->route('dashboard.Packages.index')->with('success', 'Package deleted successfully.');
    //     } catch (\Exception $e) {
    //         DB::rollback();
    //         return redirect()->route('dashboard.Packages.index')->withErrors('Failed to delete the package: ' . $e->getMessage());
    //     }
    // }

}








