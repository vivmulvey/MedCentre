@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Visits
                     <a href="{{ route('doctor.visits.create')}}" class="btn btn-primary float-right">Add</a>
                </div>
                <div class="card-body">
                    @if (count($visits) === 0)
                    <p>There are no visits</p>
                    @else


                    <table id="table-visits" class="table table-hover">
                        <thead>
                          <th>Visit ID</th>
                          <th>Date</th>
                          <th>Time</th>
                          <th>Appointment Status</th>


                      </thead>
                      <tbody>

                          @foreach ($visits as $visit)



                          <tr data-id="{{ $visit->id}}">

                              <td>{{$visit->id}}</td>
                              <td>{{ $visit->date}}</td>
                              <td>{{ $visit->time}}</td>
                              <td>  @if($visit->cancelled)
                                    <p>Cancelled</p>
                                   @else
                                      <p>Confirmed</p>
                                    @endif
                              </td>



                                <td>
                                    <a href="{{ route('doctor.visits.show', $visit->id) }}" class="btn btn-primary ">View</a>
                                    {{-- <a href="{{ route('doctor.visits.edit', $visit->id) }}" class="btn btn-warning ">Edit</a> --}}
                                    {{-- <form style="display:inline-block" method="POST" action="{{route('doctor.visits.destroy', $visit->id)}}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="form-control btn btn-danger ">Delete</a>
                                    </form> --}}
                                </td>







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
