@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Add New Doctor
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
            <form method="POST" action="{{ route('admin.doctors.store')}}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                  <label for="title">Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{old("name")}}" />
              </div>
              <div class="form-group">
                  <label for="title">Email</label>
                  <input type="text" class="form-control" id="email" name="email" value="{{old("email")}}" />
              </div>
              <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" id="address" name="address" value="{{old("address")}}" />
              </div>
              <div class="form-group">
                  <label for="title">Postcode</label>
                  <input type="text" class="form-control" id="post_code" name="post_code" value="{{old("post_code")}}" />
              </div>
              <div class="form-group">
                  <label for="title">Phone Number</label>
                  <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{old("phone_number")}}" />
              </div>
              <div class="form-group">
                  <label for="title">Start Date</label>
                  <input type="date" class="form-control" id="start_date" name="start_date" value="{{old("start_date")}}" />
              </div>
              <div class="form-group">
                  <label for="expertise">Expertise</label>
                </br>
                  <select id="expertise" name="expertise">
                      <option value="Surgeon">Surgeon</option>
                      <option value="Nurse"> Nurse</option>
                      <option value="Anesthesiologist">Anesthesiologist</option>
                      <option value="General Practician">General Practician</option>
                      <option value="Physician">Physician</option>
                      <option value="Pathologist">Pathologist</option>
                      <option value="Orthopedic">Orthopedic</option>
                      <option value="Radiologist">Radiologist</option>
                    </select>
              </div>

              <a href="{{ route('admin.doctors.index')}}" class="btn btn-link">Cancel</a>
              <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
