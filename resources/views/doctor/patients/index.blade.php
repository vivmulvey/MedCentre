@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Patients

                </div>
                <div class="card-body">
                    @if (count($patients) === 0)
                    <p>There are no patients</p>
                    @else
                    <table id="table-patients" class="table table-hover">
                        <thead>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Insurance Comapny ID</th>
                            <th>Policy Number</th>

                        </thead>
                        <tbody>


                            @foreach ($patients as $patient)

                             <tr data-id="{{ $patient->id}}">



                              <td>{{ $patient->user->name}}</td>
                              <td>{{ $patient->user->email}}</td>

                              <td>{{ $patient->insurance_company->id}}</td>
                              <td>{{ $patient->policy_number}}</td>


                                <td>
                                    <a href="{{ route('doctor.patients.show', $patient->id) }}" class="btn btn-outline-primary ">View</a>

                                </td>
                            </tr>
                          </tr>




                            @endforeach

                        </tbody>
                    </table>

                    @endif

                    <a href="{{ route('admin.home')}}" class="btn btn-link">Back</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
