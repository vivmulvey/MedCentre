@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Visit: {{$visit->date}}
                </div>

                <div class="card-body">

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>Date</td>
                                <td>{{ $visit->date }}</td>
                            </tr>
                            <tr>
                                <td>Time</td>
                                <td>{{$visit->time}}</td>
                            </tr>
                            <tr>
                                <td>Cost</td>
                                <td>{{ $visit->cost }}</td>
                            </tr>
                            <tr>
                                <td>Duration</td>
                                <td>{{ $visit->duration }}</td>
                            </tr>
                            <tr>
                                <td>Doctor Name</td>
                                <td>{{ $visit->doctor->user->name }}</td>
                            </tr>
                            <tr>
                                <td>Patient Name</td>
                                <td>{{ $visit->patient->user->name }}</td>
                            </tr>

                        </tbody>
                    </table>
                    <a href="{{ route('patient.visits.index') }}" class="btn btn-default ">Back</a>

                    <form style="display:inline-block" method="POST" action="{{route('patient.visits.destroy', $visit->id)}}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @if(!$visit->cancelled)
                        <a href="{{ route('patient.visits.cancel', $visit->id) }}" class="btn btn-warning ">Cancel</a>
                        @endif

                    </form>
                </div>
            </div>


        </div>
    </div>
</div>


@endsection
