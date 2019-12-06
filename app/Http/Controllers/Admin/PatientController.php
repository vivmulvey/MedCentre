<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Patient;
use App\Role;
use App\User;
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
      $user_role = Role::all()->where('name', 'doctor')->first();

      return view('admin.patients.index')->with([
        'patients' => $patients,
        'role_patients' => $user_role
      ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {

      $insurance_companies = InsuranceCompany::all();

      return view('admin.patients.create')->with([
         'insurance_companies' => $insurance_companies,
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

    $role_patient = Role::where('name' , 'patient')->first();

      $request->validate(
      [
        'name' => 'required|max:191',
        'email' => 'required|max:191',
        'address' => 'required|max:191',
        'post_code' => 'required|max:13',
        'phone_number' => 'required|max:13',
        'insurance_company_id' => 'required|max:191',
        'policy_number' => 'required|max:13',

      ]);

      $user = new User();
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->address = $request->input('address');
      $user->post_code = $request->input('post_code');
      $user->phone_number = $request->input('phone_number');
      $user->password = bcrypt('secret');


      $user->save();
      $user->roles()->attach($role_patient);

      $patient = new Patient();
      $patient->insurance_company_id = $request->input('insurance_company_id');
      $patient->policy_number = $request->input('policy_number');
      $patient->user_id = $request->input('user_id');
      $patient->user_id =  $user->id;


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


      return view('admin.patients.show')->with([
        'patient' => $patient,

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

      $patient = Patient::findOrFail($id);


      return view('admin.patients.edit')->with([
        'patient' => $patient,

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
    $user = User::findOrFail($patient->user_id);

    $request->validate(
    [
      'name' => 'required|max:191',
      'email' => 'required|max:191',
      'address' => 'required|max:191',
      'post_code' => 'required|max:13',
      'phone_number' => 'required|max:13',
      'insurance_company_id' => 'required|max:191',
      'policy_number' => 'required|max:13',


    ]);

    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->address = $request->input('address');
    $user->post_code = $request->input('post_code');
    $user->phone_number = $request->input('phone_number');
    $user->save();
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
    $user = User::findOrFail($id);

    $user->delete();

    return redirect()->route('admin.patients.index');

  }
}
