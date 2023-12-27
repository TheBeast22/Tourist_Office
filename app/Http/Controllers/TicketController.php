<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\City;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter()
    {   $ticket=Ticket::all();
        $city=City::all();
        return view('home',['ticket'=>$ticket,'city'=>$city]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function show(Request $request)
     {   if($request->IsMethod("post"))
        {  $validate=Validator::make($request->all(),[
           'date'=>'date|after_or_equal:now'
           ]);  
           if($validate->fails()){
   
            return $validate->errors();
  
          }else{ 
          
          $date_s=$request->date;
          echo $date_s;
         $city_id=$request->city;
        $ticket=Ticket::where('city_id',$city_id)->where('date_s',$date_s)->get();
        $city=City::all();
        return view('home',['ticket'=>$ticket,'city'=>$city]);
     }}}


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(){
        $city=City::all();
        $company=Company::all();
        return view('ticket/addticket',['company'=>$company,'city'=>$city]);




    }
    public function destroy(Ticket $ticket){

      $ticket->delete;
      return redirect()->to(route('home'));
     
    }
    public function store(Request $request)
    {
        if($request->IsMethod("post"))
        { 

            $validtate=Validator::make($request->all(),[
                'date_s'=>'date|required|after_or_equal:now',
                'date_e'=>'date|required|after_or_equal:date_s'
                
                
                ]);
                
                if($validtate->fails()){
                echo $validtate->errors();
                 }
                else{ Ticket::create(
                    ['company_id'=>$request->company,
                    'city_id'=>$request->city,
                    'date_s'=>$request->date_s,
                    'date_e'=>$request->date_e ]);
                     echo json_encode(['status'=>'Add Ticket']);
        }
                
                
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
  
}
}