<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['id','name', 'roomNo'];
    protected $table='hotel';
    public $timestamps = false;
    protected $casts = [
        'date' => 'datetime', // Ensure 'date' is treated as a datetime object
    ];

    public function RreservationPackage(){
        return $this->hasMany(ReservationPackage::class,'hotel_reservation_ID');
    }

}
