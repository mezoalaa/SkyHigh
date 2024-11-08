<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    use HasFactory;
    protected $fillable=['id','name'];
    protected $table='airline';


    public function Flight(){
        return $this->hasMany(Flight::class,'airline_id');
    }

}
