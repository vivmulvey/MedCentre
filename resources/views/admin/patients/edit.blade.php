@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
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
                        {{-- <div class="form-group">
                            <label for="title">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old("name", $??->name)}}" />
                        </div>
                        <div class="form-group">
                            <label for="title">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{old("email", $??->email)}}" />
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
                            <label for="title">Insurance Company ID</label>
                            <input type="text" class="form-control" id="insurance_company_id" name="insurance_company_id" value="{{old("insurance_company_id", $patient->insurance_company_id)}}" />
                        </div>
                        <div class="form-group">
                            <label for="title">Policy Number</label>
                            <input type="text" class="form-control" id="policy_number" name="policy_number" value="{{old("policy_number", $patient->policy_number)}}" />
                        </div>

                        <a href="{{ route('admin.patients.index')}}" class="btn btn-link">Cancel</a>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
