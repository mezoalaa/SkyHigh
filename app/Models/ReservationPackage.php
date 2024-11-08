<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Support\Facades\Bus;
use App\Models\Bus;


class ReservationPackage extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'id', 'title', 'price', 'country', 'description', 'image',
        'startDate', 'endDate', 'hotel_reservation_ID', 'bus_reservationID'
    ];

    protected $table = 'reservation_package';
    public $timestamps = false;

    protected $casts = [
        'startDate' => 'datetime',
        'endDate' => 'datetime',
    ];

    public function managePackages(){
        return $this->hasMany(ManagePackage::class, 'reservation_id');
    }

    public function hotel(){
        return $this->belongsTo(Hotel::class, 'hotel_reservation_ID');
    }

    public function bus(){
        return $this->belongsTo(Bus::class, 'bus_reservationID');
    }


}
