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

                    <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>{{Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ Auth::user()->email }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{Auth::user()->address }}</td>
                        </tr>
                        <tr>
                            <td>Post Code</td>
                            <td>{{Auth::user()->post_code }}</td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>{{Auth::user()->phone_number }}</td>
                        </tr>
                      </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
