@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Add New Patient
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
            <form method="POST" action="{{ route('admin.patients.store')}}">
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
                  <label for="title">Insurance Company ID</label>
                  <select name= "insurance_company_id">
                    @foreach ($insurance_companies as $insurance_company)
                      <option value = "{{ $insurance_company->id }}" {{ (old('insurance_company_id)') == $insurance_company->id) ? "selected" : "" }}>
                        {{$insurance_company->name}}
                      </option>

                    @endforeach"

                  </select>
              </div>
              <div class="form-group">
                  <label for="title">Policy Number</label>
                  <input type="text" class="form-control" id="policy_number" name="policy_number" value="{{old("policy_number")}}" />
              </div>

              <a href="{{ route('admin.patients.index')}}" class="btn btn-link">Cancel</a>
              <button typre="submit" class="btn btn-primary float-right">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
