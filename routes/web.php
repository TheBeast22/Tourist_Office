<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\http\Controllers\CompanyController;
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
//  Route::get('Company/Companyinfo/{id}', [CompanyController::class,"Companyinfo"]);

// Route::post('Company/Companyinfo/{id}', [CompanyController::class,"Companyinfo"])->name('Companyinfo');

//Route::delete('Company/{id}',[CompanyController::class, 'destroy'])->name("destroy") ;
Route::delete('/company/delete/{id}',[CompanyController::class, 'destroy']);


Auth::routes();
Route::get("home", [App\Http\Controllers\HomeController::class, "index"])->name("home")->middleware("auth");
