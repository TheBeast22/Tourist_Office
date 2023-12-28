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
// Route::get('/add_company',[CompanyController::class, 'create']);

// Route::post('/add_company',[CompanyController::class, 'store']);


// Route::get('delete-records','StudDeleteController@index');
// Route::get('delete/{id}','StudDeleteController@destroy');


Route::get('/index', [CompanyController::class, 'index'])->name('Company.index');
// returns the form for adding a post
Route::get('/Company/create',[CompanyController::class, 'create'])->name('Company.create');
// adds a post to the database
Route::post('/Company',[CompanyController::class, 'store'])->name('Company.store');
// returns a page that shows a full company
Route::get('/Company/{company}',[CompanyController::class, 'show'])->name('Company.show');
// returns the form for editing a company
Route::get('/Company/{company}/edit',[CompanyController::class, 'edit'])->name('Company.edit');
// updates a company
Route::put('/Company/{company}',[CompanyController::class, 'update'])->name('Company.update');
// deletes the company
Route::delete('/Company/{company}',[CompanyController::class, 'destroy'])->name('Company.destroy');


Auth::routes();
Route::get("home", [App\Http\Controllers\HomeController::class, "index"])->name("home")->middleware("auth");
