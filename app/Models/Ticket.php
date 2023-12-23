<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'city_id',
        'date_s',
        'date_e'
    ];
    protected $casts = [
        "company_id"=> "integer",
        "city_id"=> "integer",
        "date_s"=> "date",
        "date_e"=> "date"
    ];

public function company(){

 return $this->belongsTo(Company::class);
}
public function city(){
    
 return $this->belongsTo(City::class);
}
public function customers(){
    return $this->belongsToMany(Customer::class,"bookings");
}
public function hotels(){
    return $this->belongsToMany(Hotel::class,"bookings");
}}