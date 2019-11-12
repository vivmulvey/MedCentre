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

                    You are logged in as a patient!

                    </br>

                    Insurance Policy Number: {{Auth::user()->patient->policy_number}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
