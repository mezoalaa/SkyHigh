<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bus extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['id','date','location','destination'];
    protected $table='bus';

    public $timestamps = false;
    protected $casts = [
        'date' => 'datetime', // Ensure 'date' is treated as a datetime object
    ];

    public function RreservationPackage(){
        return $this->hasMany(ReservationPackage::class, 'bus_reservationID');
    }
}
