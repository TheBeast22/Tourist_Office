<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Customer;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ratings = Rating::all();
        $customers = Customer::whereIn("id",Rating::pluck("customer_id")->toArray())->get();
        return view("ratings.all", ["customers"=> $customers,"ratings"=> $ratings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $rating = Rating::where("customer_id",$request->customer_id)->where("hotel_id",$request->hotel_id)->first();
        if($rating)
         return redirect()->to(route("edit_rating",["rating"=>$rating]));
    
        return view("ratings.add",["request"=> $request]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Rating::create(["customer_id"=>$request->customer_id,"hotel_id"=>$request->hotel_id,"rate"=>$request->rate]);
        return redirect()->to(route("all_ratings"));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(Rating $rating)
    {
        return view("ratings.edit", ["rating"=>$rating]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rating $rating)
    {
        $rating->rate = $request->rate;
        $rating->save();
        return redirect()->to(route("all_ratings"));
    }
}
