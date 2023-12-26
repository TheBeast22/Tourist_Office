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
     

    public function customersReserved(){
        return $this->belongsToMany(Customer::class,"hotels_customers");
    }
    public function customersRatedWithRate(){
        return $this->belongsToMany(Customer::class,"ratings")->withPivot("rate");
    }
    public function bookCustomers(){
        return $this->belongsToMany(Customer::class,"bookings")->withPivot("book_date");
    }
    public function bookTickets(){
        return $this->belongsToMany(Ticket::class,"bookings")->withPivot("book_date");
    }
    
}
