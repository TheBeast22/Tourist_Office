<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Ticket;
use App\Models\City;
use App\Models\Hotel;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
       $bookings=Booking::all();
       return view('booking/viewbooking',['bookings'=>$bookings]);
    }


    public function filterbooking(Request $request){

    if($request->IsMethod('post')){
    $validate=Validator::make($request->all(),[
            
      'email'=>'email|nullable|exists:customers,email|max:20|ends_with:yahoo.com,hotmail.com,gmail.com',
      'date'=>'date|nullable'
    ]);

    if($validate->fails()){

    return $validate->errors();

    }else{
      $email =$request->email;
      $date =$request->date;
      switch($request->filter)
    { case 1 :
            
    $custom=Customer::where('email',$email)->value('id'); 
    $bookings=Booking::where('customer_id',$custom)->get();
    return view('booking/viewbooking',["bookings"=> $bookings]);
       
    break;
    case 2 :
    $bookings=Booking::where('book_date',$date)->get();
    return view('booking/viewbooking',["bookings"=> $bookings]);
    break;
    case 3 :
        
    $custom=Customer::where('email',$email)->value('id');  
    $bookings=Booking::where('customer_id',$custom)->where('book_date',$date)->get();
    return view('booking/viewbooking',["bookings"=> $bookings]);
    break;
        
        

  }}

    }}
    public function delete(Booking $booking){
       
       
        $booking->delete();
        echo 'delete';
        return redirect()->to(route('books'));
    }
 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

     $ticket=Ticket::find($id);
     return view('booking/addbook',['ticket'=>$ticket]);
   
   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {   
        if($request->IsMethod("post"))
        {    $validate=Validator::make($request->all(),[
            'email'=>'required|email|exists:customers,email|max:20|ends_with:yahoo.com,hotmail.com,gmail.com',]);

            if($validate->fails()){
   
            return $validate->errors();
   
            }else{
             $customer_id=Customer::where('email',$request->email)->value('id'); 
              $tick_id=$id;
            
              Ticket::find($tick_id)->customers;
              Booking::create(['ticket_id'=>$tick_id,
              'customer_id'=>$customer_id,
              'hotel_id'=>$request->hotel,
              'book_date'=>$request->date ]);
               echo json_encode(['status'=>'created']);
       
                 
               
    
    
    
         
}   
    }}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $book=Booking::find($id);
    //     echo $book;
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {   
        
        return view('booking/editbook',['booking'=>$booking]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {   
    
       
       $hotel_id=$request->hotel;
       $book= Booking::find($id);
       $book->update(['hotel_id'=>$hotel_id]);
      
       return redirect()->to(route('books'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */

  
}
