<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        // $company = Company::find($request->id);

        // if ($request->isMethod('delete') ||$company === null) {
        //     return response(
        //         "company with id {$request->id} not found",
        //         Response::HTTP_NOT_FOUND
        //     );
        // }

        // if ($company->delete() === false) {
        //     return response(
        //         "Couldn't delete the company with id {$request->id}",
        //         Response::HTTP_BAD_REQUEST
        //     );
        // }

        // return response(["id" => $request->id, "deleted" => true], Response::HTTP_OK);

            $company->delete();

            return redirect('/companys');
        }


    // public function Companyinfo($id,Request $request)
    // {
    //     $company = Company::find($id);
    //     if($request->isMethod('post')){
    //       $company->update($request->all());
    //         return redirect()->back();




    //     }else{
    //         return view('Company',['Company'=>$company]);
    //     }
    // }
}
