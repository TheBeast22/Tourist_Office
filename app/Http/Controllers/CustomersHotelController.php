<?php

namespace App\Http\Controllers;

use App\Models\Customers_Hotel;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::whereIn("id",Customers_Hotel::pluck("customer_id")->toArray())->get();
        return view("reserves.all", ["customers"=>$customers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Customers_Hotel::create(["customer_id"=>$request->customer_id,"hotel_id"=>$request->hotel_id]);
        return redirect()->to(route("reserved/all"));
    }
}
