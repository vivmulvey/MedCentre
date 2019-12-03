@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Hi , {{Auth::user()->name}}

                      </br>

                      You are logged in as a doctor!

                  </br>
                  <a href="{{ route('doctor.visits.index')}}" class="btn btn-primary float-right">View Visits</a>

                  {{-- Expertise: {{Auth::user()->doctor->expertise}} --}}



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
