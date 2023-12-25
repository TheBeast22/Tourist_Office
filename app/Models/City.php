<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        "name","country"
    ];
    protected $casts = [
        "name"=> "string",
        "country"=> "string",
    ];
    public function hotels(){
        return $this->hasMany(Hotel::class);
    }
    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
    public function makingCompanies(){
        return $this->belogsToMany(Company::class,"tickets")->withPivot(["date_s","date_e"]);
    }
}
