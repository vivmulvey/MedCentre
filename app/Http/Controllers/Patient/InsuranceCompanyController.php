<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\InsuranceCompany;
use Illuminate\Support\Facades\Auth;


class InsuranceCompanyController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:patient'); //make sure the user has patient role
  }

    public function index()
    {
      $user = Auth::user();

      $patient = $user->patient;
      $insurance_company = InsuranceCompany::findOrFail($patient->insurance_company_id);

      return view('patient.insurance_company.index')->with([
        'insurance_company' => $insurance_company
      ]);
    }
}
