@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Insurance Companies
                    <a href="{{ route('admin.insurance_companies.create')}}" class="btn btn-primary float-right">Add</a>
                </div>
                <div class="card-body">
                    @if (count($insurance_companies) === 0)
                    <p>There are no insurance companies</p>
                    @else
                    <table id="table-insurance_companies" class="table table-hover">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>


                        </thead>
                        <tbody>


                            @foreach ($insurance_companies as $insurance_company)

                             <tr data-id="{{ $insurance_company->id}}">


                              <td>{{ $insurance_company->id}}</td>
                              <td>{{ $insurance_company->name}}</td>
                              <td>{{ $insurance_company->email}}</td>




                                <td>
                                    <a href="{{ route('admin.insurance_companies.show', $insurance_company->id) }}" class="btn btn-default ">View</a>
                                    {{-- <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-warning ">Edit</a>
                                    <form style="display:inline-block" method="POST" action="{{route('admin.doctors.destroy', $doctor->user->id)}}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="form-control btn btn-danger ">Delete</a>
                                    </form> --}}
                                </td>
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
