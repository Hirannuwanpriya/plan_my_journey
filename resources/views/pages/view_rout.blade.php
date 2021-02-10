@extends('layouts.app')

@section('content')

    <style>
        ul.timeline {
            list-style-type: none;
            position: relative;
        }
        ul.timeline:before {
            content: ' ';
            background: #d4d9df;
            display: inline-block;
            position: absolute;
            left: 29px;
            width: 2px;
            height: 100%;
            z-index: 400;
        }
        ul.timeline > li {
            margin: 20px 0;
            padding-left: 20px;
        }
        ul.timeline > li:before {
            content: ' ';
            background: white;
            display: inline-block;
            position: absolute;
            border-radius: 50%;
            border: 3px solid #4E66F8;
            left: 20px;
            width: 20px;
            height: 20px;
            z-index: 400;
        }
    </style>

    <div class="container mt-5">
    <div class="row">
        <!-- Content Row -->
        <div class="col">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Routs #23</h6>
                    <a href="/dashboard" class="anchorjs-link">{{ __('Dashboard') }}</a>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <ul class="timeline">
                        <li>
                            <a target="_blank" href="https://www.totoprayogo.com/#">3 De Fonseka Pl, Colombo 00400, Sri Lanka</a>
                            <p href="#" class="float-right text-muted">6 November, 2020 10:30 A.M</p>
                            <small>02Hr 58Min</small>
                        </li>
                        <li>
                            <a href="#">1A, 02 Centre Rd, Colombo, Sri Lanka</a>
                            <p href="#" class="float-right text-muted">6 November, 2020 12:22 P.M</p>
                            <small>10 Min</small>
                        </li>
                        <li>
                            <a href="#">15 Sir Ernest de Silva Mawatha, Colombo 00700, Sri Lanka</a>
                            <p href="#" class="float-right text-muted">6 November, 2020 01:15 P.M</p>
                            <small>53 Min</small>
                        </li>
                        <li>
                            <a href="#">135 Dutugemunu St, Colombo, Sri Lanka</a>
                            <p href="#" class="float-right text-muted">6 November, 2020 02:26 P.M</p>
                            <small>01 Hr 11 Min</small>
                        </li>
                        <li>
                            <a href="#">No. 02 Stanley Tilakaratne Mawatha, Nugegoda 10250, Sri Lanka</a>
                            <p href="#" class="float-right text-muted">6 November, 2020 02:43 P.M</p>
                            <small>17 Min</small>
                        </li>
                    </ul>
                    <div class="card shadow mt-4">
                        <div class="card-body">
                            <p>Weather : Cloudy</p>
                            <p>Distance : 35 <small>Km</small></p>
                            <p>Spending : 05 <small>Hr</small> 31 <small>Min</small></p>
                            <p>Expense : 1,500 <small>Rs</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>

@endsection
