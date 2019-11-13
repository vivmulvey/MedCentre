<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;

class DoctorController extends Controller
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
      $doctors = Doctor::all(); //get all doctors from database and put it in $doctors

      return view('admin.doctors.index')->with([
        'doctors' => $doctors
      ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {

      // $publishers = Publisher::all();

      return view('admin.doctors.create')->with([
      //   'publishers' => $publishers
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
        'start_date' => 'required|date|max:8',
        'expertise' => 'required|max:191',

      ]);

      $doctor = new Doctor();
      $doctor->name = $request->input('name');
      $doctor->email = $request->input('email');
      $doctor->start_date = $request->input('start_date');
      $doctor->expertise = $request->input('expertise');


      $doctor->save();

      return redirect()->route('admin.doctors.index');

  }


  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      $doctor = Doctor::findOrFail($id);
      //$reviews = $book->reviews()->get();

      return view('admin.doctors.show')->with([
        'doctor' => $doctor,
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
      //$publishers = Publisher::all();
      $doctor = Doctor::findOrFail($id);


      return view('admin.doctors.edit')->with([
        'doctor' => $doctor,
        //'publishers' => $publishers
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

    $doctor = Doctor::findOrFail($id);

    $request->validate(
    [
      // 'name' => 'required|max:191',
      // 'email' => 'required|max:191',
      'start_date' => 'required|date|max:10',
      'expertise' => 'required|max:191',
      //'isbn' => 'required|alpha_num|size:13|unique:books,isbn,'.$book->id, //input new isbn , ignore current book isbn

    ]);

    // $doctor->name = $request->input('name');
    // $doctor->email = $request->input('email');
    $doctor->start_date = $request->input('start_date');
    $doctor->expertise = $request->input('expertise');


    $doctor->save();

    return redirect()->route('admin.doctors.index');


    }


  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $doctor = Doctor::findOrFail($id);

    $doctor->delete();

    return redirect()->route('admin.doctors.index');

  }
}
