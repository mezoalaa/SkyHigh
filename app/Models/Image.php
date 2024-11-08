<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// class images extends Model
// {
//     use HasFactory;
//     protected $fillable=['url','place_id'];
//     protected $table='images';

//     public function User(){
//         return $this->hasMany(User::class,);
//     }

//     public function Place()
//     {
//         return $this->belongsTo(Place::class);
//     }
//     // public function RreservationPackage(){
//     //     return $this->hasMany(RreservationPackage::class,'image_reservation_package_ID');
//     // }
// }


class Image extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'place_id'];
    protected $table = 'images';

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
