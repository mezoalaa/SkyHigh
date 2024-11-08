<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'description', 'address', 'phone', 'email','logo','favicon','Facebook','Instagram','X','Google','Website','user_id'];
    protected $table = 'profile';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

