<?php

namespace App\Http\Controllers;

use App\Models\Customers_Hotel;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        if(empty($customers[0]))
         return redirect()->to(route("errors",["message"=>"some data not found"]));
        return view("reserves.all", ["customers"=>$customers]);
    }
    public function show(Customer $customer){
        $validate = Validator::make(["cid"=>$customer->id],[
            "cid" => "required|integer|exists:customers_hotels,customer_id",
        ],["cid.exists" => "the customer has no reserved hotels"]);
        if ($validate->fails()) 
         return redirect()->to(route("errors",["message"=>$validate->errors()->first()]));
        return view("reserves.one",["customer"=>$customer]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            "customer_id" => "required|integer|exists:customers,id",
            "hotel_id"=>"required|integer|exists:hotels,id",
        ]);
        if ($validate->fails())
         return redirect()->to(route("errors",["message"=> $validate->errors()->first()]));
        Customers_Hotel::create(["customer_id"=>$request->customer_id,"hotel_id"=>$request->hotel_id]);
        return redirect()->to(route("reserved/all"));
    }
}
