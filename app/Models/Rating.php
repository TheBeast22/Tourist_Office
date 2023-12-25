<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = [
        "hotel_id","customer_id","rate"
    ];
    protected $casts = [
        "hotel_id"=> "integer",
        "customer_id"=> "integer",
        "rate"=>"integer"
    ];
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }
}
