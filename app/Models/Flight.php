<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;
    protected $fillable=['id','price', 'startDate','endDate', 'location', 'destination', 'airport_id', 'airline_id','user_id'];
    protected $table='flight';

    protected $casts = [
        'startDate' => 'datetime',
        'endDate' => 'datetime',
    ];

    public function Airport(){
        return $this->belongsTo(Airport::class,'airport_id');
    }
    public function Airline(){
        return $this->belongsTo(Airline::class,'airline_id');
    }
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function bookings()
    {
        return $this->hasMany(FlightBooking::class);
    }


}
