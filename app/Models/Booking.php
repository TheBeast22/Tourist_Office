<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ticket;
use App\Models\Customer;
use App\Models\Hotel;
class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'customer_id',
        'hotel_id',
        'book_date'
    ];
    protected $casts = [
        "ticket_id"=> "integer",
        "customer_id"=> "integer",
        "hotel_id"=> "integer",
        "book_date"=> "date"
    ];
    public function ticket(){

     return $this->belongsTo(Ticket::class);



    }
    public function customer(){

        return $this->belongsTo(Customer::class);
   
   
   
       }
       public function hotel(){

        return $this->belongsTo(Hotel::class);
   
   
   
       }

}
