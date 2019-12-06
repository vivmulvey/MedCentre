require('./bootstrap');

var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["January", "Febuary", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets: [{
            label: 'Visits 2019',
            data: [120, 190, 300, 500, 200, 300, 600, 200, 100, 140, 170, 280, 120],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'

            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});



//polar
var ctxPA = document.getElementById("polarChart").getContext('2d');
var myPolarChart = new Chart(ctxPA, {
    type: 'polarArea',
    data: {
        labels: ["Surgeon", "Nurse", "Anesthesiologist", "General Practician", "Physician", "Pathologist", "Orthopedic", "Radiologist"],
        datasets: [{
            data: [300, 150, 100, 40, 120, 100, 130, 200],
            backgroundColor: ["rgba(219, 0, 0, 0.1)", "rgba(0, 165, 2, 0.1)", "rgba(190, 144, 212,1)",
                "rgba(55, 59, 66, 0.1)", "rgba(0, 0, 0, 0.3)", "rgba(255, 206, 86, 1)", "rgba(255, 159, 64, 1)", "rgba(255, 195, 15, 0.2)"
            ],
            hoverBackgroundColor: ["rgba(219, 0, 0, 0.2)", "rgba(0, 165, 2, 0.2)",
                "rgba(190, 144, 212,1)", "rgba(55, 59, 66, 0.1)", "rgba(0, 0, 0, 0.4)", "rgba(255, 206, 86, 1)", "rgba(255, 159, 64, 1)", "rgba(255, 195, 15, 0.2)"
            ]
        }]
    },
    options: {
        responsive: true
    }
});

//line
var ctxL = document.getElementById("lineChart").getContext('2d');
var myLineChart = new Chart(ctxL, {
    type: 'line',
    data: {
        labels: ["January", "Febuary", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets: [{
                label: "Patient Intake 2019",
                data: [650, 590, 800, 810, 560, 550, 600, 800, 790, 420, 500, 830],
                backgroundColor: [
                    'rgba(105, 0, 132, .2)',
                ],
                borderColor: [
                    'rgba(200, 99, 132, .7)',
                ],
                borderWidth: 2
            },
            {
                label: "Patient Intake 2018",
                data: [280, 480, 400, 490, 860, 270, 900, 450, 890.360, 530, 500, 620],
                backgroundColor: [
                    'rgba(0, 137, 132, .2)',
                ],
                borderColor: [
                    'rgba(0, 10, 130, .7)',
                ],
                borderWidth: 2
            }
        ]
    },
    options: {
        responsive: true
    }
});

//line
var ctxL = document.getElementById("lineChart2").getContext('2d');
var myLineChart2 = new Chart(ctxL, {
    type: 'line',
    data: {
        labels: ["2013", "2014", "2015", "2016", "2017", "2018", "2019"],
        datasets: [{
                label: "Registered Patients",
                data: [200, 280, 320, 400, 450, 570, 700],
                backgroundColor: [
                    'rgba(105, 0, 132, .2)',
                ],
                borderColor: [
                    'rgba(200, 99, 132, .7)',
                ],
                borderWidth: 2
            },
            {
                label: "Non-Registered Patients",
                data: [100, 120, 200, 210, 240, 290, 310],
                backgroundColor: [
                    'rgba(0, 137, 132, .2)',
                ],
                borderColor: [
                    'rgba(0, 10, 130, .7)',
                ],
                borderWidth: 2
            }
        ]
    },
    options: {
        responsive: true
    }
});

var ctxL = document.getElementById("lineChart3").getContext('2d');
var myLineChart3 = new Chart(ctxL, {
    type: 'line',
    data: {
        labels: ["2013", "2014", "2015", "2016", "2017", "2018", "2019"],
        datasets: [{
                label: "Registered Patients",
                data: [200, 280, 320, 400, 450, 570, 700],
                backgroundColor: [
                    'rgba(105, 0, 132, .2)',
                ],
                borderColor: [
                    'rgba(200, 99, 132, .7)',
                ],
                borderWidth: 2
            },
            {
                label: "Non-Registered Patients",
                data: [100, 120, 200, 210, 240, 290, 310],
                backgroundColor: [
                    'rgba(0, 137, 132, .2)',
                ],
                borderColor: [
                    'rgba(0, 10, 130, .7)',
                ],
                borderWidth: 2
            }
        ]
    },
    options: {
        responsive: true
    }
});
