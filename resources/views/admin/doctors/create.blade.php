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
              {{-- <div class="form-group">
                  <label for="title">Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{old("name")}}" />
              </div>
              <div class="form-group">
                  <label for="title">Email</label>
                  <input type="text" class="form-control" id="email" name="email" value="{{old("email")}}" />
              </div> --}}
              {{-- <div class="form-group">
                  <label for="title">Publisher</label>
                  <select name="publisher_id">
                    @foreach ($publishers as $publisher)
                      <option value="{{$publisher->id}}" {{(old('publisher_id', $book->publisher->id) == $publisher->id) ? "selected" : ""}}>
                        {{$publisher->name}}
                      </option>
                    @endforeach
              </div> --}}
              <div class="form-group">
                  <label for="title">Start Date</label>
                  <input type="date" class="form-control" id="start_date" name="start_date" value="{{old("start_date")}}" />
              </div>
              <div class="form-group">
                  <label for="title">Expertise</label>
                  <input type="text" class="form-control" id="expertise" name="expertise" value="{{old("expertise")}}" />
              </div>

              <a href="{{ route('admin.doctors.index')}}" class="btn btn-link">Cancel</a>
              <button typre="submit" class="btn btn-primary float-right">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
