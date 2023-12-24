<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers_Hotel extends Model
{
    use HasFactory;
    protected $fillable = [
        "customer_id","hotel_id"
    ];
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }
}
