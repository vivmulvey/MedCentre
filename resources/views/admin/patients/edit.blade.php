@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Edit Patient
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('admin.patients.update', $patient->id )}}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="title">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old("name", $patient->user->name)}}" />
                        </div>
                        <div class="form-group">
                            <label for="title">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{old("email", $patient->user->email)}}" />
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{old("address", $patient->user->address)}}" />
                        </div>
                        <div class="form-group">
                            <label for="post_code">Post Code</label>
                            <input type="text" class="form-control" id="post_code" name="post_code" value="{{old("post_code", $patient->user->post_code)}}" />
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{old("phone_number", $patient->user->phone_number)}}" />
                        </div>


                        <div class="form-group">
                            <label for="title">Insurance Company ID</label>
                            <input type="text" class="form-control" id="insurance_company_id" name="insurance_company_id" value="{{old("insurance_company_id", $patient->insurance_company_id)}}" />
                        </div>
                        <div class="form-group">
                            <label for="title">Policy Number</label>
                            <input type="text" class="form-control" id="policy_number" name="policy_number" value="{{old("policy_number", $patient->policy_number)}}" />
                        </div>

                        <a href="{{ route('admin.patients.index')}}" class="btn btn-link">Cancel</a>
                        <button type="submit" class="btn btn-outline-success float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
