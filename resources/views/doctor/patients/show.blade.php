@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Patient: {{$patient->user->name}}
                </div>

                <div class="card-body">

                    <table class="table table-hover">
                        <tbody>
                          <tr>
                               <th>Name</th>
                               <td>{{ $patient->user->name }}</td>
                           </tr>
                            <tr>
                               <th>Email</th>
                               <td>{{ $patient->user->email }}</td>
                           </tr>
                           <tr>
                              <th>Address</th>
                              <td>{{ $patient->user->address }}</td>
                          </tr>
                          <tr>
                             <th>Post Code</th>
                             <td>{{ $patient->user->post_code }}</td>
                         </tr>
                         <tr>
                            <th>Phone Number</th>
                            <td>{{ $patient->user->phone_number }}</td>
                        </tr>
                           <tr>
                               <th>Insurance Policy ID</th>
                               <td>{{ $patient->insurance_company->id }}</td>
                           </tr>
                           <tr>
                               <th>Policy Number</th>
                               <td>{{$patient->policy_number }}</td>
                           </tr>

                        </tbody>
                    </table>
                    <a href="{{ route('doctor.patients.index') }}" class="btn btn-default ">Back</a>


                  </div>
                </div>

                        </div>
                    </div>
                </div>


@endsection
