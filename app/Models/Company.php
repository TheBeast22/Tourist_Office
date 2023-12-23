<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable=['title','address','phone'];
    
    public function Ticket(){
        return $this->hasMany(Ticket::class);
    }
}
