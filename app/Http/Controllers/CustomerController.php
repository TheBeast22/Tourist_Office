<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Booking;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view("customers.all", ["customers"=> $customers]);
    }
    public function bookedCostomers(){
        $customers = Customer::whereIn("id",Booking::pluck("customer_id"))->get();
        return view("customers.booked",["customers"=>$customers]);
    }
    public function customerForm(){
        return view("customers.oneform");
    }
    public function customerFromEmail(Request $request){
        $customer = Customer::where("email",$request->email)->first();
        return view("customers.options", ["customer"=> $customer]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("customers.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Customer::create(["name"=>$request->name,"mobile"=>$request->mobile,"gender"=>$request->gender,"email"=>$request->email]);
        return redirect()->to(route("all_customers"));
    }
   /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view("customers.one", ["customer"=> $customer]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view("customers.edit", ["customer"=> $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $customer->name = $request->name;
        $customer->mobile = $request->mobile;
        $customer->gender = $request->gender;
        $customer->email = $request->email;
        $customer->save();
        return redirect()->to(route("all_customers"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->back();
    }
}
