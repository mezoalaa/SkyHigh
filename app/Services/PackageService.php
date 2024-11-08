<?php
namespace App\Services;
use App\Models\ManagePackage;


class PackageService{




    // public function getMainPackages(){
    //     return ManagePackage::with('reservationPackage')->paginate(10);


    // }
    // PackageService.php
    public function getMainPackages($userId){
        return ManagePackage::with('reservationPackage')
                        ->where('user_id', $userId)
                        ->paginate(10);
    }

    // public function getPackagesByAgencyId($agencyId)
    // {
    //     return ManagePackage::whereHas('User', function ($query) use ($agencyId) {
    //         $query->where('id', $agencyId);
    //     })->with('reservationPackage')->paginate(10);
    // }

        // public function getPackagesByCountry($country, $startDate , $endDate) {
        //     $query = ManagePackage::whereHas('reservationPackage', function ($query) use ($country,  $startDate, $endDate) {
        //         $query->where('country', 'like', '%' . $country . '%');


        //         if (!empty($startDate)) {
        //             $query->where('startDate', '>=', $startDate);
        //         }

        //         if (!empty($endDate)) {
        //             $query->where('endDate', '<=', $endDate);
        //         }
        //     });

        //     // Debugging: Get the raw SQL query to check if it's correctly formed
        //     \Log::info($query->toSql());

        //     return $query->with('reservationPackage')->paginate(10);
        // }



            public function getPackagesByCountry($country, $startDate = null, $endDate = null) {
                $query = ManagePackage::whereHas('reservationPackage', function ($query) use ($country, $startDate, $endDate) {
                    $query->where('country', 'like', '%' . $country . '%');

                    if (!empty($startDate)) {
                        $query->where('startDate', '>=', $startDate);
                    } else {
                        \Log::info("No start date provided");
                    }

                    if (!empty($endDate)) {
                        $query->where('endDate', '<=', $endDate);
                    } else {
                        \Log::info("No end date provided");
                    }
                });

                \Log::info($query->toSql(), $query->getBindings()); // To see actual values being bound

                return $query->with('reservationPackage')->get();
            }




    // public function getPackagesByCountry($country) {
    //     return ManagePackage::whereHas('reservationPackage', function ($query) use ($country) {
    //         $query->where('country', 'like', '%' . $country . '%');
    //     })->with('reservationPackage')->paginate(10);
    // }







}
