<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Patient;
use App\Role;
use App\User;

class PatientController extends Controller
{
  public function index()
  {
      $patients = Patient::all(); //get all patients from database and put it in $patients
      $user_role = Role::all()->where('name', 'doctor')->first();

      return view('doctor.patients.index')->with([
        'patients' => $patients,
        'role_patients' => $user_role
      ]);
  }

  public function show($id)
  {
      $patient = Patient::findOrFail($id);


      return view('doctor.patients.show')->with([
        'patient' => $patient,

      ]);
  }
}
