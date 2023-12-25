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
        return $this->belongsToMany(Ticket::class,"bookings")->withPivot("book_date");
    }
    public function bookhotels(){
        return $this->belongsToMany(Hotel::class,"bookings")->withPivot("book_date");
    }
    public function hotelsRatingWithRatedHotels(){
        return $this->belongsToMany(Hotel::class,"ratings")->withPivot("rate");
    }
    public function ratings(){
        return $this->hasMany(Rating::class);
    }
    public function reservedHotels(){
        return $this->belongsToMany(Hotel::class,"customers_hotels");
    }
    public function bookings(){
        return $this->hasMany(Booking::class);
    }
}
