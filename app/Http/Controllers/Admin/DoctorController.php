<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;
use App\Role;
use App\User;

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
      $user_role = Role::all()->where('name', 'doctor')->first();

      return view('admin.doctors.index')->with([
        'doctors' => $doctors,
        'role_doctors' => $user_role
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

    $role_doctor = Role::where('name' , 'doctor')->first();

      $request->validate(
      [
        'name' => 'required|max:191',
        'email' => 'required|max:191',
        'address' => 'required|max:191',
        'post_code' => 'required|max:13',
        'phone_number' => 'required|max:13',
        'start_date' => 'required|date|max:10',
        'expertise' => 'required|max:191',

      ]);

      $user = new User();
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->address = $request->input('address');
      $user->post_code = $request->input('post_code');
      $user->phone_number = $request->input('phone_number');
      $user->password = bcrypt('secret');
      $user->save();
      $user->roles()->attach($role_doctor);





      $doctor = new Doctor();

      $doctor->start_date = $request->input('start_date');
      $doctor->expertise = $request->input('expertise');
      $doctor->user_id = $request->input('user_id');
      $doctor->user_id =  $user->id;


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

      $doctor = Doctor::findOrFail($id);


      return view('admin.doctors.edit')->with([
        'doctor' => $doctor,

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

    $user = User::findOrFail($doctor->user_id);

    $request->validate(
    [
      'name' => 'required|max:191',
      'email' => 'required|max:191',
      'start_date' => 'required|date|max:10',
      'expertise' => 'required|max:191',
      

    ]);

    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->save();
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
    $user = User::findOrFail($id);

    $user->delete();

    return redirect()->route('admin.doctors.index');

  }
}
