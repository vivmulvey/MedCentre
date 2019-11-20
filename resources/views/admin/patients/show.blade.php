@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Patient: {{$patient->user->name}}
                </div>

                <div class="card-body">

                    <table class="table table-hover">
                        <tbody>
                           <tr>
                                <td>Name</td>
                                <td>{{ $patient->user->name }}</td>
                            </tr>
                             <tr>
                                <td>Email</td>
                                <td>{{ $patient->user->email }}</td>
                            </tr>
                            <tr>
                                <td>Insurance Policy ID</td>
                                <td>{{ $patient->insurance_company->id }}</td>
                            </tr>
                            <tr>
                                <td>Policy Number</td>
                                <td>{{$patient->policy_number }}</td>
                            </tr>

                        </tbody>
                    </table>
                    <a href="{{ route('admin.patients.index') }}" class="btn btn-default ">Back</a>
                    <a href="{{ route('admin.patients.edit', $patient->id) }}" class="btn btn-warning ">Edit</a>
                    <form style="display:inline-block" method="POST" action="{{route('admin.patients.destroy', $patient->id)}}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="form-control btn btn-danger ">Delete</a>
                    </form>
                  </div>
                </div>

                    {{-- <div class="card">
                        <div class="card-header">
                            Reviews
                        </div>
                        <div class="card-body">
                            @if(count($reviews) == 0)
                            <p> There are no reviews for this book </p>
                            @else
                            <table class='table'>
                                <thead>
                                    <th>Title</th>
                                    <th>Body</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($reviews as $review)
                                    <tr>
                                        <th>{{ $review->title }}</th>
                                        <th>{{ $review->body }}</th>
                                        <th>
                                            <form style="display:inline-block" method="POST" action="{{ route('admin.reviews.destroy', ['id' => $book->id,'rid'=> $review->id]) }}">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class"form-control btn btn-danger">Delete</a>
                                            </form>
                                        </th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            @endif --}}
                        </div>
                    </div>
                </div>


@endsection
