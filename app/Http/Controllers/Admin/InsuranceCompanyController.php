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
        //
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
        //
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
