@extends('layouts.app')

@section('content')

    <style>
        @media (max-width: 767px) {
            .card {
                height: 10rem;
                padding: 1.5rem 1.5rem 1rem 1.5rem
            }
        }

        .temp {
            font-size: 5rem;
            color: rgb(57, 57, 58)
        }

        .card-1 {
            background: linear-gradient(to right, #ffffff 50%, rgba(241, 224, 190, 0.507))
        }

        @media (max-width: 767px) {
            .temp {
                font-size: 3rem
            }
        }

        .location {
            margin-bottom: 1.5rem
        }

        @media (max-width: 767px) {
            .location {
                font-size: 0.75rem
            }
        }

        .img-fluid {
            float: right;
            width: 65%;
            display: flex;
            align-items: center
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <div class="container mt-5">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Spending (Monthly)
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ auth()->user()->id ? 'Rs 10,000': 'Rs 0.00' }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Avg SPENDING
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            {{ auth()->user()->id ? '23%': '0%' }}</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 23%"
                                                 aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Unique Routs
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ auth()->user()->id ? '8': '0' }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-map-marker fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Total ROUTS (Monthly)
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ auth()->user()->id == 1 ? '18': '0' }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-map fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Weather</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="card card-1">
                            <div class="row pl-3 pr-3">
                                <div class="col-6">
                                    <div class="temp">31°</div>
                                </div>
                                <div class="col-6 justify-content-right pt-3">
                                    <img class="img-fluid" src="https://img.icons8.com/dusk/128/000000/sun--v1.png">
                                </div>
                                <div class="col-12">
                                    <h4 class="location text-center">Colombo 03, Srilanka</h4>
                                </div>
                            </div>
                        </div>

                        <div class="row ml-2 mt-4">
                            <div class="col">
                                <div class="row row1 pl-2">31&deg;</div>
                                <div class="row row2"><img class="img-fluid"
                                                           src="https://img.icons8.com/ios/100/000000/sun.png"/></div>
                                <div class="row row3 pl-2">Fri</div>
                            </div>
                            <div class="col">
                                <div class="row row1 pl-2">31&deg;</div>
                                <div class="row row2"><img class="img-fluid"
                                                           src="https://img.icons8.com/windows/100/000000/cloud.png"/></div>
                                <div class="row row3 pl-2">Sat</div>
                            </div>
                            <div class="col">
                                <div class="row row1 pl-2">32&deg;</div>
                                <div class="row row2"><img class="img-fluid"
                                                           src="https://img.icons8.com/windows/100/000000/cloud.png"/>
                                </div>
                                <div class="row row3 pl-2">Sun</div>
                            </div>
                            <div class="col">
                                <div class="row row1 pl-2">30&deg;</div>
                                <div class="row row2"><img class="img-fluid"
                                                           src="https://img.icons8.com/windows/100/000000/cloud.png"/>
                                </div>
                                <div class="row row3 pl-2">Mon</div>
                            </div>
                            <div class="col">
                                <div class="row row1 pl-2">32&deg;</div>
                                <div class="row row2"><img class="img-fluid"
                                                           src="https://img.icons8.com/ios/100/000000/sun.png"/>
                                </div>
                                <div class="row row3 pl-2">Tue</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="myAreaChart" style="display: block; width: 1039px; height: 320px;" width="1039"
                                    height="320" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <!-- Content Row -->
        <div class="row">
            <!-- Content Row -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Latest Routs</h6>
                        <a href="{{ route('user.my_routs') }}" class="anchorjs-link">{{ __('View All') }}</a>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table table-hover">
                            <tbody>
                            @foreach($journeys as $journey)
                                <tr>
                                    <th>{{ $journey->start_address }}</th>
                                    <td>{{ $journey->created_at->format('j-m-Y g:i A') }}</td>
                                    <td>{{ $journey->distance_text }}</td>
                                    <td>Rs {{ $journey->duration_value }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <th>Dehiwala, Fort...</th>
                                <td>03-07-2020 10:24 A.M</td>
                                <td>25Km</td>
                                <td>Rs 600</td>
                            </tr>
                            <tr>
                                <th>Kohuwala, Nugegoda...</th>
                                <td>03-07-2020 10:24 A.M</td>
                                <td>1Km</td>
                                <td>Rs 200</td>
                            </tr>
                            <tr>
                                <th>Kandy, Home...</th>
                                <td>03-07-2020 10:24 A.M</td>
                                <td>320Km</td>
                                <td>Rs 1500</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Spending Areas</h6>
                        <a href="{{ route('user.my_wallet') }}" class="anchorjs-link">{{ __('Wallet') }}</a>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="myPieChart" width="486" height="245" class="chartjs-render-monitor"
                                    style="display: block; width: 486px; height: 245px;"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i> Bus
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i> Fule
                            </span>
                            <span class="mr-2">
                                    <i class="fas fa-circle text-info"></i> Food
                                </span>
                            <span class="mr-2">
                                    <i class="fas fa-circle text-warning"></i> Other
                                </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function (n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        // Area Chart Example
        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Sep", "Oct", "Nov", "Dec", "Jan", "Feb", "Mar"],
                datasets: [{
                    label: "Earnings",
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "rgba(78, 115, 223, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointBorderColor: "rgba(78, 115, 223, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: [5000, 8000, 2400, 11000, 3500, 6000],
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function (value, index, values) {
                                return 'Rs' + number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function (tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
                        }
                    }
                }
            }
        });

        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Pie Chart Example
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Bus", "Fule", "Food", "Other"],
                datasets: [{
                    data: [33, 27, 30, 15],
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#ffc107'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#ffc107'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });
    </script>
@endsection
