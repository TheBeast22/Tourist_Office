<?php
namespace App\Http\Controllers\Traits;

trait TestData{
    public function test($data,$message = NULL){
       if($message){
          if(!isset($data[0]) || empty($data[0]))
           die(view("errors",["message"=>"$message not found"]));

      }
       else
        if($data->fails())
          die(view("errors",["message"=> $data->errors()]));
    }
}