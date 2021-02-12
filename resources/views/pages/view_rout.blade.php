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
                            @foreach($journeys as $journey)
                                <li>
                                    <a href="javascript:void(0)">{{ $journey->start_address }}</a>
                                    <p href="javascript:void(0)" class="float-right text-muted">{{ $journey->created_at->format('j-F-Y g:i A') }}</p>
                                    <small>{{ $journey->duration_text }}</small>
                                </li>
                            @endforeach
                            <li>
                                <a href="javascript:void(0)">1A, 02 Centre Rd, Colombo, Sri Lanka</a>
                                <p href="javascript:void(0)" class="float-right text-muted">6 November, 2020 12:22
                                    P.M</p>
                                <small>10 Min</small>
                            </li>
                            <li>
                                <a href="javascript:void(0)">15 Sir Ernest de Silva Mawatha, Colombo 00700, Sri
                                    Lanka</a>
                                <p href="javascript:void(0)" class="float-right text-muted">6 November, 2020 01:15
                                    P.M</p>
                                <small>53 Min</small>
                            </li>
                            <li>
                                <a href="javascript:void(0)">135 Dutugemunu St, Colombo, Sri Lanka</a>
                                <p href="javascript:void(0)" class="float-right text-muted">6 November, 2020 02:26
                                    P.M</p>
                                <small>01 Hr 11 Min</small>
                            </li>
                            <li>
                                <a href="javascript:void(0)">No. 02 Stanley Tilakaratne Mawatha, Nugegoda 10250, Sri
                                    Lanka</a>
                                <p href="javascript:void(0)" class="float-right text-muted">6 November, 2020 02:43
                                    P.M</p>
                                <small>17 Min</small>
                            </li>
                        </ul>
                        <div class="card shadow mt-4">
                            <div class="card-body">
                                <p>Weather : Cloudy</p>
                                <p>Distance : 35 <small>Km</small></p>
                                <p>Spending : 05 <small>Hr</small> 31 <small>Min</small></p>
                                <p>Expense : <span class="expense">500</span> <small>Rs</small></p>
                                <button class="btn btn-primary"
                                        data-toggle="modal" data-target="#exampleModalCenter">
                                    Add Spending</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Spending</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Rout') }}</label>

                            <div class="col-md-6">
                                <select class="form-control"  name="sub_rout" id="sub_rout" required>
                                    @foreach($journeys as $journey)
                                        <option value="{{ $journey->id }}">{{ $journey->start_address }}</option>
                                    @endforeach
                                        <option value="2">1A, 02 Centre Rd, Colombo, Sri Lanka</option>
                                        <option value="3">15 Sir Ernest de Silva Mawatha, Colombo 00700, Sri Lanka</option>
                                        <option value="4">135 Dutugemunu St, Colombo, Sri Lanka</option>
                                        <option value="5">No. 02 Stanley Tilakaratne Mawatha, Nugegoda 10250, Sri Lanka</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Amount') }}</label>

                            <div class="col-md-6">
                                <input  type="number" class="form-control" id="amount" name="amount" value="{{ old('amount') }}" required autofocus>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="save_spending">Save Spending</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $( document ).ready(function() {
            $('#save_spending').click(function(){

                var amount = $('.expense').text();

                var new_amount = parseInt(amount) + parseInt($('#amount').val());


                $('.expense').text(new_amount);
            });
        });

    </script>

@endsection
