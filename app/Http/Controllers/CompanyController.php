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
    $companies = Company::all();
    return view('Company.index', compact('companies'));
  }
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    
    $validate = Validator::make($request->all(), [
      'title' => 'required|string|min:8|max:50|regex:/^[A-Za-z]+$/',
      'address' => 'required|string|min:8|max:50|regex:/^[A-Za-z]+$/',
      'phone' => "required|string|unique:companies,phone|regex:/^(09)[0-9]{7}[1-9]$/",

    ]);
    if($validate->fails())
    die(dd($validate->errors()));

    Company::create($request->all());

    return redirect()->route('Company.index')
      ->with('success', 'company created successfully.');
  }
  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id) {
    $validate = Validator::make($request->all(), [
      'title' => 'required|string|min:8|max:50|regex:/^[A-Za-z]+$/',
      'address' => 'required|string|min:8|max:50|regex:/^[A-Za-z]+$/',
      'phone' => "required|string|unique:companies,phone|regex:/^(09)[0-9]{7}[1-9]$/",

    ]);
    if($validate->fails())
        dd(die($validate->errors()));

    $company = Company::find($id);
    $company->update($request->all());
    return redirect()->route('Company.index')
      ->with('success', 'Post updated successfully.');
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id){
    $company = Company::find($id);
    $company->delete();
    return redirect()->route('Company.index')
      ->with('success', 'Company deleted successfully');
  }
  // routes functions
  /**
   * Show the form for creating a new post.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('Company.create');
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $company = Company::find($id);
    return view('Company.show', compact('company'));
  }
  /**
   * Show the form for editing the specified post.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $company = Company::find($id);
    return view('Company.edit', compact('company'));
  }
}
