@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">My Details</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif



                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{{Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{Auth::user()->address }}</td>
                            </tr>
                            <tr>
                                <th>Post Code</th>
                                <td>{{Auth::user()->post_code }}</td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td>{{Auth::user()->phone_number }}</td>
                            </tr>
                            <tr>
                                <th>Insurance Company</th>
                                <td>{{Auth::user()->patient->insurance_company->name }}</td>
                            </tr>
                            <tr>
                                <th>Policy Number</thd>
                                <td>{{Auth::user()->patient->policy_number }}</td>
                            </tr>


                        </tbody>
                    </table>


                    {{-- Insurance Policy Number: {{Auth::user()->patient->policy_number}} --}}

                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">My Visits</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table table-hover">
                        <tbody>
                            <canvas id="lineChart3"></canvas>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>


    </div>
    <script>
    var ctxL = document.getElementById("lineChart3").getContext('2d');
    var myLineChart3 = new Chart(ctxL, {
        type: 'line',
        data: {
            labels: ["2015", "2016", "2017", "2018", "2019"],
            datasets: [{
                    label: "5 Year History",
                    data: [1, 1, 2, 0, 4],
                    backgroundColor: [
                        'rgba(105, 0, 132, .2)',
                    ],
                    borderColor: [
                        'rgba(200, 99, 132, .7)',
                    ],
                    borderWidth: 2
                },

            ]
        },
        options: {
            responsive: true
        }
    });
    </script>
</div>
@endsection
