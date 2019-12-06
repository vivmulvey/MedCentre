@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Add New Visit
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
                    <form method="POST" action="{{ route('doctor.visits.store')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{old("date")}}" />
                        </div>
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="time" class="form-control" id="time" name="time" value="{{old("time")}}" />
                        </div>

                        <div class="form-group">
                            <label for="duration">Duration</label>
                          </br>
                            <select id="duration" name="duration">
                                <option value="15m">15 minutes</option>
                                <option value="30m">30 minutes</option>
                                <option value="45m">45 minutes</option>
                                <option value="1hr">1 hr</option>
                                <option value="1hr15m">1 hr 15 minutes</option>
                                <option value="1hr30m">1 hr 30 minutes</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cost">Cost</label>
                            <input type="float" class="form-control" id="cost" name="cost" value="{{old("cost")}}" />
                        </div>
                        <div class="form-group">
                            <label for="patient">Patient Name</label>
                          </br>
                            <select name="patient_id">
                                @foreach ($patients as $patient)
                                <option value="{{$patient->id}}" {{(old('patient') == $patient->id) ? "selected" : ""}}>
                                    {{$patient->user->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <a href="{{ route('doctor.visits.index')}}" class="btn btn-link">Cancel</a>
                        <button typre="submit" class="btn btn-outline-success float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
