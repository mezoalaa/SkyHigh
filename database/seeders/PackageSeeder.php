<?php

namespace Database\Seeders;
use App\Models\RreservationPackage;
use Database\Factories\PackageFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ReservationPackage; // use your actual model namespace


class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        RreservationPackage::factory()->count(20)->create();

            // 'image_reservation_package_ID' => Str::random(10).'jpg',
            // 'hotel_reservation_ID' => Str::random(10),
            // 'bus_reservationID' => Str::random(10),

    }
}
