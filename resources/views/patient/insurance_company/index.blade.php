@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    {{ $insurance_company->name}}

                </div>
                <div class="card-body">
                    {{-- @if (count($insurance_companies) === 0)
                    <p>There are no insurance companies</p>
                    @else --}}
                    <table id="table-insurance_companies" class="table table-hover">
                        <thead>

                       </thead>
                        <tbody>

                          <table class="table table-hover">
                              <tbody>
                                  {{-- <tr>
                                      <td>Name</td>
                                      <td>{{ $insurance_company->name }}</td>
                                  </tr> --}}
                                  <tr>
                                      <th>Email</th>
                                      <td>{{$insurance_company->email }}</td>
                                  </tr>
                                  <tr>
                                      <th>Address</th>
                                      <td>{{ $insurance_company->address }}</td>
                                  </tr>
                                  <tr>
                                      <th>Post Code</th>
                                      <td>{{$insurance_company->post_code }}</td>
                                  </tr>
                                  <tr>
                                      <th>Phone Number</th>
                                      <td>{{$insurance_company->phone_number }}</td>
                                  </tr>


                              </tbody>
                          </table>




                                <td>

                                    {{-- <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-warning ">Edit</a>
                                    <form style="display:inline-block" method="POST" action="{{route('admin.doctors.destroy', $doctor->user->id)}}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="form-control btn btn-danger ">Delete</a>
                                    </form> --}}
                                </td>
                            </tr>







                        </tbody>
                    </table>

                    <a href="{{ route('patient.home')}}" class="btn btn-link">Back</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
