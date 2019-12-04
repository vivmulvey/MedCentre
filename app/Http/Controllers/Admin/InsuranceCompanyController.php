<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\InsuranceCompany;
use App\Patient;

class InsuranceCompanyController extends Controller
{


  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:admin'); //make sure the user has admin role
  }

    public function index()
    {
      $insurance_companies = InsuranceCompany::all(); //get all books from database and put it in $books

      return view('admin.insurance_companies.index')->with([
        'insurance_companies' => $insurance_companies
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.insurance_companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate(
      [
        'name' => 'required|max:191',
        'address' => 'required|max:191',
        'post_code' => 'required|max:13',
        'phone_number' => 'required|max:13',
        'email' => 'required|max:191'



      ]);

      $insurance_company = new InsuranceCompany();
      $insurance_company->name = $request->input('name');
      $insurance_company->address = $request->input('address');
      $insurance_company->post_code = $request->input('post_code');
      $insurance_company->phone_number = $request->input('phone_number');
      $insurance_company->email = $request->input('email');
      $insurance_company->save();

        return redirect()->route('admin.insurance_companies.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $insurance_company = InsuranceCompany::findOrFail($id);
      $patients = $insurance_company->patients()->get();



      return view('admin.insurance_companies.show')->with([
        'insurance_company' => $insurance_company,
        'patients' => $patients

      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $insurance_company = InsuranceCompany::findOrFail($id);


      return view('admin.insurance_companies.edit')->with([
        'insurance_company' => $insurance_company,

      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $insurance_company = InsuranceCompany::findOrFail($id);



      $request->validate(

      [
        'name' => 'required|max:191',
        'address' => 'required|max:191',
        'post_code' => 'required|max:13',
        'phone_number' => 'required|max:13',
        'email' => 'required|max:191',


      ]);

      $insurance_company->name = $request->input('name');
      $insurance_company->address = $request->input('address');
      $insurance_company->post_code = $request->input('post_code');
      $insurance_company->phone_number = $request->input('phone_number');
      $insurance_company->email = $request->input('email');
      $insurance_company->save();


      $insurance_company->save();

      return redirect()->route('admin.insurance_companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
