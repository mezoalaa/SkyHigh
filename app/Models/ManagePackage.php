<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ManagePackage extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable=['id','user_id','reservation_id'];
    protected $table='manage_package';
    public $timestamps = false;

    protected $casts = [
        'date' => 'datetime', // Ensure 'date' is treated as a datetime object
    ];

    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function reservationPackage()
    {
        return $this->belongsTo(ReservationPackage::class, 'reservation_id');
    }
}



