<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;
    protected $fillable=['id','name','location'];
    protected $table='airport';

    public function Flight(){
        return $this->hasMany(Flight::class,'airport_id');
    }
    

}
