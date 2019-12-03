<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Visit;
use App\Patient;
use App\Doctor;
use Illuminate\Support\Facades\Auth;

class VisitController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:doctor'); //make sure the user has admin role
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
      $visits = Visit::where('doctor_id',$user->doctor->id)->get();

      return view('doctor.visits.index')->with([
        'visits' => $visits
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
      $user = Auth::user();
      $patients = Patient::all();


      return view('doctor.visits.create')->with([
        'patients' => $patients,


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
      $doctor = Doctor::findOrFail(Auth::user()->doctor->id);

      $request->validate(
      [
        'date' => 'required|max:10',
        'time' => 'required|max:10',
        'duration' => 'required|max:20',
        'cost' => 'required|max:10',
        'patient_id' => 'required'


      ]);

      $visit = new Visit();
      $visit->date = $request->input('date');
      $visit->time = $request->input('time');
      $visit->duration = $request->input('duration');
      $visit->cost = $request->input('cost');
      $visit->patient_id = $request->input('patient_id');
      $visit->doctor_id = $doctor->id;


      $visit->save();

      return redirect()->route('doctor.visits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $visit = Visit::findOrFail($id);

      return view('doctor.visits.show')->with([
        'visit' => $visit

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
      $visit = Visit::findOrFail($id);
      $doctors = Doctor::all();
      $patients = Patient::all();


      return view('doctor.visits.edit')->with([
        'visit' => $visit,
        'doctors' => $doctors,
        'patients' => $patients,

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
      $doctor = Doctor::findOrFail(Auth::user()->doctor->id);
      $visit = Visit::findOrFail($id);



      $request->validate(
      [
        'date' => 'required|max:10',
        'time' => 'required|max:10',
        'duration' => 'required|max:20',
        'cost' => 'required|max:10'



      ]);


      $visit->date = $request->input('date');
      $visit->time = $request->input('time');
      $visit->duration = $request->input('duration');
      $visit->cost = $request->input('cost');
      $visit->patient_id = $request->input('patient_id');
      $visit->doctor_id = $doctor->id;


      $visit->save();

      return redirect()->route('doctor.visits.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $visit = Visit::findOrFail($id);

      $visit->delete();

      return redirect()->route('doctor.visits.index');

    }

    public function cancel($id){
      $visit = Visit::findOrFail($id);
      $visit->cancelled=true;
      $visit->save();

      return redirect()->route('doctor.visits.index');
    }
}
