<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable=['id','type','user_id'];
    protected $table='payment';

    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
}
