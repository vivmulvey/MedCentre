<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Patient;
use App\Doctor;
use App\Visit;

class VisitController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:patient'); //make sure the user has admin role
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = Auth::user();
      // $visits = Visit::all(); //get all books from database and put it in $books
      $visits = Visit::where('patient_id',$user->patient->id)->get();

      return view('patient.visits.index')->with([
        'visits' => $visits
      ]);
    }

    public function show($id)
    {
      $visit = Visit::findOrFail($id);

      return view('patient.visits.show')->with([
        'visit' => $visit

      ]);
    }

    public function cancel($id){
      $visit = Visit::findOrFail($id);
      $visit->cancelled=true;
      $visit->save();

      return redirect()->route('patient.visits.index');
    }

}
