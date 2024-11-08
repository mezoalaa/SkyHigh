<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'type'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ManagePackage(){
        return $this->hasMany(ManagePackage::class,'user_id');
    }
    public function Payment(){
        return $this->hasMany(Payment::class,'user_id');
    }

    public function address()
    {
        return $this->hasOne(UserAddress::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class, 'imageID');
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function flight()
    {
        return $this->hasMany(flight::class);
    }
    public function flightBookings()
    {
        return $this->hasMany(FlightBooking::class);
    }

    public function contactus()
    {
        return $this->hasMany(contactUs::class);
    }


}
