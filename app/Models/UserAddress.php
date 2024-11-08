<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;
    protected $fillable = [ 'user_id','agency_addresses_id', 'adress', 'city', 'country', 'phone','phone'];
    protected $table = 'user_addresses';

    public function user(){
        return $this->belongsTo(User::class);
    }


}

