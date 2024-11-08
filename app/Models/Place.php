<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Place extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'description', 'image'];
    protected $table = 'place';

    public function images() {
        return $this->hasMany(Image::class);  // Note 'Image' class is used here
    }
}
