@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Edit Doctor
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
                    <form method="POST" action="{{ route('admin.doctors.update', $doctor->id )}}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         <div class="form-group">
                            <label for="title">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old("name", $doctor->user->name)}}" />
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{old("email", $doctor->user->email)}}" />
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{old("address", $doctor->user->address)}}" />
                        </div>
                        <div class="form-group">
                            <label for="post_code">Post Code</label>
                            <input type="text" class="form-control" id="post_code" name="post_code" value="{{old("post_code", $doctor->user->post_code)}}" />
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{old("phone_number", $doctor->user->phone_number)}}" />
                        </div>

                        <div class="form-group">
                            <label for="title">Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" value="{{old("start_date", $doctor->start_date)}}" />
                        </div>
                        <div class="form-group">
                            <label for="title">Expertise</label>
                            <input type="text" class="form-control" id="expertise" name="expertise" value="{{old("expertise", $doctor->expertise)}}" />
                        </div>

                        <a href="{{ route('admin.doctors.index')}}" class="btn btn-link">Cancel</a>
                        <button type="submit" class="btn btn-outline-success float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
