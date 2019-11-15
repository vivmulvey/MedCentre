<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Patient;
use App\Role;
use App\InsuranceCompany;

class PatientController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:admin'); //make sure the user has admin role
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $patients = Patient::all(); //get all patients from database and put it in $patients
      // $user_role = Role::all()->where('name', 'doctor')->first();

      return view('admin.patients.index')->with([
        'patients' => $patients,
        // 'role_doctors' => $user_role
      ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {

       $insurance_companys = InsuranceCompany::all();

      return view('admin.patients.create')->with([
         'insurance_companys' => $insurance_companys
      ]);
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
        'email' => 'required|max:191',
        'insurance_company_id' => 'required|max:191',
        'policy_number' => 'required|max:13',

      ]);

      $patient = new Patient();
      $patient->name = $request->input('name');
      $patient->email = $request->input('email');
      $patient->insurance_company_id = $request->input('insurance_company_id');
      $patient->policy_number = $request->input('policy_number');


      $patient->save();

      return redirect()->route('admin.patients.index');

  }


  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      $patient = Patient::findOrFail($id);
      //$reviews = $book->reviews()->get();

      return view('admin.dpatient.show')->with([
        'patient' => $patient,
        //'reviews' => $reviews
      ]);
  }

//
//   /**
//    * Show the form for editing the specified resource.
//    *
//    * @param  int  $id
//    * @return \Illuminate\Http\Response
//    */
  public function edit($id)
  {
      $insurance_companys = InsuranceCompany::all();
      $patient = Patient::findOrFail($id);


      return view('admin.patients.edit')->with([
        'patient' => $patient,
        'insurance_companys' => $insurance_companys
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

    $patient = Patient::findOrFail($id);

    $request->validate(
    [
      // 'name' => 'required|max:191',
      // 'email' => 'required|max:191',
      'insurance_company_id' => 'required|max:191',
      'policy_number' => 'required|max:13',
      //'isbn' => 'required|alpha_num|size:13|unique:books,isbn,'.$book->id, //input new isbn , ignore current book isbn

    ]);

    // $doctor->name = $request->input('name');
    // $doctor->email = $request->input('email');
    $patient->insurance_company_id = $request->input('insurance_company_id');
    $patient->policy_number = $request->input('policy_number');


    $patient->save();

    return redirect()->route('admin.patients.index');


    }


  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $patient = Patient::findOrFail($id);

    $patient->delete();

    return redirect()->route('admin.patients.index');

  }
}
