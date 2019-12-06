<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Home Routes
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/home', 'Admin\HomeController@index')->name('admin.home');
Route::get('/user/home', 'User\HomeController@index')->name('user.home');
Route::get('/doctor/home', 'Doctor\HomeController@index')->name('doctor.home');
Route::get('/patient/home', 'Patient\HomeController@index')->name('patient.home');

//Admin Routes
Route::get('/admin/doctors', 'Admin\DoctorController@index')->name('admin.doctors.index');
Route::get('/admin/doctors/create', 'Admin\DoctorController@create')->name('admin.doctors.create');
Route::get('/admin/doctors/{id}', 'Admin\DoctorController@show')->name('admin.doctors.show');
Route::post('/admin/doctors/store', 'Admin\DoctorController@store')->name('admin.doctors.store');
Route::get('/admin/doctors/{id}/edit', 'Admin\DoctorController@edit')->name('admin.doctors.edit');
Route::put('/admin/doctors/{id}', 'Admin\DoctorController@update')->name('admin.doctors.update');
Route::delete('/admin/doctors/{id}', 'Admin\DoctorController@destroy')->name('admin.doctors.destroy');

Route::get('/admin/patients', 'Admin\PatientController@index')->name('admin.patients.index');
Route::get('/admin/patients/create', 'Admin\PatientController@create')->name('admin.patients.create');
Route::get('/admin/patients/{id}', 'Admin\PatientController@show')->name('admin.patients.show');
Route::post('/admin/patients/store', 'Admin\PatientController@store')->name('admin.patients.store');
Route::get('/admin/patients/{id}/edit', 'Admin\PatientController@edit')->name('admin.patients.edit');
Route::put('/admin/patients/{id}', 'Admin\PatientController@update')->name('admin.patients.update');
Route::delete('/admin/patients/{id}', 'Admin\PatientController@destroy')->name('admin.patients.destroy');

Route::get('/admin/visits', 'Admin\VisitController@index')->name('admin.visits.index');
Route::get('/admin/visits/create', 'Admin\VisitController@create')->name('admin.visits.create');
Route::get('/admin/visits/{id}', 'Admin\VisitController@show')->name('admin.visits.show');
Route::post('/admin/visits/store', 'Admin\VisitController@store')->name('admin.visits.store');
Route::get('/admin/visits/{id}/edit', 'Admin\VisitController@edit')->name('admin.visits.edit');
Route::put('/admin/visits/{id}', 'Admin\VisitController@update')->name('admin.visits.update');
Route::delete('/admin/visits/{id}', 'Admin\VisitController@destroy')->name('admin.visits.destroy');

Route::get('/admin/insurance_companies', 'Admin\InsuranceCompanyController@index')->name('admin.insurance_companies.index');
Route::get('/admin/insurance_companies/create', 'Admin\InsuranceCompanyController@create')->name('admin.insurance_companies.create');
Route::get('/admin/insurance_companies/{id}', 'Admin\InsuranceCompanyController@show')->name('admin.insurance_companies.show');
Route::post('/admin/insurance_companies/store', 'Admin\InsuranceCompanyController@store')->name('admin.insurance_companies.store');
Route::get('/admin/insurance_companies/{id}/edit', 'Admin\InsuranceCompanyController@edit')->name('admin.insurance_companies.edit');
Route::put('/admin/insurance_companies/{id}', 'Admin\InsuranceCompanyController@update')->name('admin.insurance_companies.update');
Route::delete('/admin/insurance_companies/{id}', 'Admin\InsuranceCompanyController@destroy')->name('admin.insurance_companies.destroy');


Route::get('/admin/visits/cancel/{id}', 'Admin\VisitController@cancel')->name('admin.visits.cancel');
Route::get('/doctor/visits/cancel/{id}', 'Doctor\VisitController@cancel')->name('doctor.visits.cancel');
Route::get('/patient/visits/cancel/{id}', 'Patient\VisitController@cancel')->name('patient.visits.cancel');



//Doctor Route
Route::get('/doctor/visits', 'Doctor\VisitController@index')->name('doctor.visits.index');
Route::get('/doctor/visits/create', 'Doctor\VisitController@create')->name('doctor.visits.create');
Route::get('/doctor/visits/{id}', 'Doctor\VisitController@show')->name('doctor.visits.show');
Route::post('/doctor/visits/store', 'Doctor\VisitController@store')->name('doctor.visits.store');
Route::get('/doctor/visits/{id}/edit', 'Doctor\VisitController@edit')->name('doctor.visits.edit');
Route::put('/doctor/visits/{id}', 'Doctor\VisitController@update')->name('doctor.visits.update');
Route::delete('/doctor/visits/{id}', 'Doctor\VisitController@destroy')->name('doctor.visits.destroy');
Route::get('/doctor/patients', 'Doctor\PatientController@index')->name('doctor.patients.index');
Route::get('/doctor/patients/{id}', 'Doctor\PatientController@show')->name('doctor.patients.show');

//Patient Routes
Route::get('/patient/visits', 'Patient\VisitController@index')->name('patient.visits.index');
Route::get('/patient/visits/{id}', 'Patient\VisitController@show')->name('patient.visits.show');
Route::delete('/patient/visits/{id}', 'Patient\VisitController@destroy')->name('patient.visits.destroy');
Route::get('/patient/insurance_company', 'Patient\InsuranceCompanyController@index')->name('patient.insurance_company.index');
