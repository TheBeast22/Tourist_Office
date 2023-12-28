<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\CustomersHotelController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get("/", function () {
    return view('welcome');
});
Route::get("/errors/{message}",function($message){
    return view("errors",["message"=>$message]);
})->name("errors");
Auth::routes();
Route::get("home",  [App\Http\Controllers\TicketController::class,'filter'])->name("home")->middleware("auth");
//--------------------------------------Customer Routes------------------------------------------------------------//
Route::get("customers/all",[CustomerController::class,"index"])->name("all_customers")->middleware("auth");
Route::get("customer/edit/{customer}",[CustomerController::class,"edit"])->name("edit_customer")->middleware("auth");
Route::get("customer/delete/{customer}",[CustomerController::class,"destroy"])->name("delete_customer")->middleware("auth");
Route::get("customer/add/form",[CustomerController::class,"create"])->name("customer_form")->middleware("auth");
Route::get("customer/one/{customer}",[CustomerController::class,"show"])->name("one_customer")->middleware("auth");
Route::get("customer/infos",[CustomerController::class,"customerForm"])->name("one_customer_form")->middleware("auth");
Route::get("customers/booked",[CustomerController::class,"bookedCostomers"])->name("booked_customers")->middleware("auth");
Route::post("customer/update/{customer}",[CustomerController::class,"update"])->name("update_customer")->middleware("auth");
Route::post("customer/add",[CustomerController::class,"store"])->name("add_customer")->middleware("auth");
Route::post("customer/email",[CustomerController::class,"customerFromEmail"])->name("email_customer")->middleware("auth");
//--------------------------------End of Customer Routes----------------------------------------------------------//
Route::get("ratings/all",[RatingController::class,"index"])->name("all_ratings")->middleware("auth");
Route::get("rating/edit/{rating}",[RatingController::class,"edit"])->name("edit_rating")->middleware("auth");
Route::get("reserved/all",[CustomersHotelController::class,"index"])->name("all_reserved")->middleware("auth");
Route::get("rating/add/form/{customer_id}/{hotel_id}",[RatingController::class,"create"])->name("rating_form")->middleware("auth");
Route::get("ratings/all/hotels",[RatingController::class,"allHotelsRatings"])->name("all_hotels_ratings")->middleware("auth");
Route::get("rating/hotel/form",[RatingController::class,"hotelRatingsForm"])->name("hotel_rating_form")->middleware("auth");
Route::get("rating/customer/{customer}",[RatingController::class,"customerRatings"])->name("customer_ratings")->middleware("auth");
Route::post("rating/hotel",[RatingController::class,"hotelRatings"])->name("hotel_ratings")->middleware("auth");
Route::post("rating/update/{rating}",[RatingController::class,"update"])->name("update_rating")->middleware("auth");
Route::post("rating/add",[RatingController::class,"store"])->name("add_rating")->middleware("auth");
//--------------------------------End of Ratings and Reserved Routes----------------------------------------------//
Route::get("/booksview", [App\Http\Controllers\BookingController::class,'index'])->name('books')->middleware("auth");
Route::get("/add/book/{id}", [App\Http\Controllers\BookingController::class,'create'])->name('add-book')->middleware('auth');
Route::post("/create/book/{id}", [App\Http\Controllers\BookingController::class,'store'])->name('create-book')->middleware("auth");;
Route::get("/bookedit/{booking}", [App\Http\Controllers\BookingController::class,'edit'])->name ('edit')->middleware("auth");;
Route::post("/update/book/{booking}", [App\Http\Controllers\BookingController::class,'update'])->name('update-book')->middleware("auth");;
Route::post("/bookfilter", [App\Http\Controllers\BookingController::class,'filterbooking'])->name('filter-book')->middleware("auth");;
Route::get("/delete/book/{booking}", [App\Http\Controllers\BookingController::class,'delete'])->name('delete')->middleware("auth");;

Route::get("/tickview", [App\Http\Controllers\TicketController::class,'filter'])->name('tickets')->middleware("auth");;
Route::post("/filter/ticket", [App\Http\Controllers\TicketController::class,'show'])->name('filtered-ticket')->middleware("auth");;
Route::get("ticket/addticket", [App\Http\Controllers\TicketController::class,'add'])->name('add-ticket')->middleware("auth");;
Route::post("/create/ticket", [App\Http\Controllers\TicketController::class,'store'])->name('create-ticket')->middleware("auth");;
Route::get("/delete/ticket{ticket}", [App\Http\Controllers\TicketController::class,'destroy'])->name('delete-ticket')->middleware("auth");;