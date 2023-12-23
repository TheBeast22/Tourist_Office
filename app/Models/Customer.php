<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        "name","mobile","gender","email"
    ];
    protected $casts = [
        "name"=> "string",
        "mobile"=> "string",
        "gender"=> "string",
        "email"=> "string"
    ];
    public function tikets(){
        return $this->belongsToMany(Ticket::class,"bookings");
    }
    public function bookhotels(){
        return $this->belongsToMany(Hotel::class,"bookings");
    }
    public function hotelsRating(){
        return $this->belongsToMany(Hotel::class,"ratings");
    }
    public function reservedHotels(){
        return $this->belongsToMany(Hotel::class,"customers_hotels");
    }
}
