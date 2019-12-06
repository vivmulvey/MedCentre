@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-12 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Add New Insurance Company
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
            <form method="POST" action="{{ route('admin.insurance_companies.store')}}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                  <label for="title">Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{old("name")}}" />
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
                  <label for="title">Email</label>
                  <input type="text" class="form-control" id="email" name="email" value="{{old("email")}}" />
              </div>


              <a href="{{ route('admin.insurance_companies.index')}}" class="btn btn-link">Cancel</a>
              <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
