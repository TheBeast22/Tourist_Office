<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = ["name","city_id"];
    protected $casts = [
        "name"=> "string",
        "city_id"=>"integer"
    ];

public function city(){
    return $this->belongsTo(City::class);
}



    public function bookings(){
    return $this->hasMany(Booking::class);
    }


    public function ratings(){
        return $this->hasMany(Rating::class);
    }
     

    public function customershotel(){
        return $this->belongsToMany(customer::class);
    }
}
