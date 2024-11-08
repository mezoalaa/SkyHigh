<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reviews extends Model
{
    use HasFactory;
    protected $fillable=['id','star_rating','manage_id'];
    protected $table='reviwes';

    public function manage_package(){
        return $this->belongsTo(ManagePackage::class);
    }
}
