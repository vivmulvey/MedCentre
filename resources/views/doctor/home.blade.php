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
                                <th>Expertise</th>
                                <td>{{Auth::user()->doctor->expertise }}</td>
                            </tr>
                            <tr>
                                <th>Start Date</th>
                                <td>{{Auth::user()->doctor->start_date }}</td>
                            </tr>


                        </tbody>
                    </table>





                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Patients</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table table-hover">
                        <tbody>
                            <canvas id="lineChartDocP"></canvas>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Visits</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table table-hover">
                        <tbody>
                            <canvas id="lineChartDocV"></canvas>

                        </tbody>
                    </table>


                </div>
            </div>

            <script>
                var ctxL = document.getElementById("lineChartDocV").getContext('2d');
                var myLineChart3 = new Chart(ctxL, {
                    type: 'line',
                    data: {
                        labels: ["2015", "2016", "2017", "2018", "2019"],
                        datasets: [{
                                label: "5 Year History",
                                data: [500, 580, 600, 588, 630],
                                backgroundColor: [
                                    'rgba(0, 137, 132, .2)',
                                ],
                                borderColor: [
                                    'rgba(0, 10, 130, .7)',
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

            <script>
                var ctxL = document.getElementById("lineChartDocP").getContext('2d');
                var myLineChart3 = new Chart(ctxL, {
                    type: 'line',
                    data: {
                        labels: ["2015", "2016", "2017", "2018", "2019"],
                        datasets: [{
                                label: "5 Year History",
                                data: [300, 340, 400, 360, 380],
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
    </div>
    @endsection
