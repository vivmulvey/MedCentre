@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Insurance Company: {{$insurance_company->name}}
                </div>

                <div class="card-body">

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td>{{ $insurance_company->name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{$insurance_company->email }}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{ $insurance_company->address }}</td>
                            </tr>
                            <tr>
                                <td>Post Code</td>
                                <td>{{$insurance_company->post_code }}</td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td>{{$insurance_company->phone_number }}</td>
                            </tr>


                        </tbody>
                    </table>
                    <a href="{{ route('admin.insurance_companies.index') }}" class="btn btn-default ">Back</a>
                    <a href="{{ route('admin.insurance_companies.edit', $insurance_company->id) }}" class="btn btn-warning ">Edit</a>
                    <form style="display:inline-block" method="POST" action="{{route('admin.insurance_companies.destroy', $insurance_company->id)}}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="form-control btn btn-danger ">Delete</a>
                    </form>
                </div>
            </div>
          </br>

            <div class="card">
                <div class="card-header">
                    Patients Registered to : {{$insurance_company->name}}
                </div>
                <div class="card-body">
                    @if(count($patients) == 0)
                    <p> There are no patients registered with this insurance company </p>
                    @else
                    <table class='table table-hover'>
                        <thead>
                            <th>Name</th>
                            <th>Policy Number</th>
                        </thead>
                        <tbody>
                            @foreach ($patients as $patient)
                            <tr>
                                <td>{{ $patient->user->name }}</td>
                                <td>{{ $patient->policy_number }}</td>
                                <td>
                                   <a href="{{ route('admin.patients.show', $patient->id) }}" class="btn btn-default ">View</a>
                              
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @endif
                </div>
            </div>


        </div>
    </div>
</div>


@endsection
