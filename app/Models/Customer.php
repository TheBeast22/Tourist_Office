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
    public function hotels(){
        return $this->belongsToMany(Hotel::class,"bookings");
    }
    public function hotelsRating(){
        return $this->hasMany(Rating::class);
    }
}
