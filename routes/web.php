<?php

use App\Http\Controllers\CustomerController;
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
Auth::routes();
Route::get("home", [App\Http\Controllers\HomeController::class, "index"])->name("home")->middleware("auth");
//--------------------------------------Customer Routes------------------------------------------------------------//
Route::get("customers/all",[CustomerController::class,"index"])->name("all_customers")->middleware("auth");
Route::get("customer/edit/{customer}",[CustomerController::class,"edit"])->name("edit_customer")->middleware("auth");
Route::get("customer/delete/{customer}",[CustomerController::class,"destroy"])->name("delete_customer")->middleware("auth");
Route::get("customer/add/form",[CustomerController::class,"create"])->name("customer_form")->middleware("auth");
Route::get("customer/one/{customer}",[CustomerController::class,"show"])->name("one_customer")->middleware("auth");
Route::post("customer/update/{customer}",[CustomerController::class,"update"])->name("update_customer")->middleware("auth");
Route::post("customer/add",[CustomerController::class,"store"])->name("add_customer")->middleware("auth");
//--------------------------------End of Customer Routes----------------------------------------------------------//