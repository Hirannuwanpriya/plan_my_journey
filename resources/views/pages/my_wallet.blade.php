@extends('layouts.app')

@section('content')

    <div class="container mt-5">
    <div class="row">
        <!-- Content Row -->
        <div class="col">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">All Spending</h6>
                    <a href="/dashboard" class="anchorjs-link">{{ __('Wallet') }}</a>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>Home, Colombo 03...</th>
                            <td>03-07-2020 10:24 A.M</td>
                            <td>15Km</td>
                            <td>Rs 400</td>
                            <td>
                                <a href="{{ route('user.view_rout') }}" class="btn btn-primary">{{ __('View') }}</a>
                            </td>
                        </tr>
                        <tr>
                            <th>Dehiwala, Fort...</th>
                            <td>03-07-2020 10:24 A.M</td>
                            <td>25Km</td>
                            <td>Rs 600</td>
                            <td>
                                <a href="{{ route('user.view_rout') }}" class="btn btn-primary">{{ __('View') }}</a>
                            </td>
                        </tr>
                        <tr>
                            <th>Kohuwala, Nugegoda...</th>
                            <td>03-07-2020 10:24 A.M</td>
                            <td>1Km</td>
                            <td>Rs 200</td>
                            <td>
                                <a href="{{ route('user.view_rout') }}" class="btn btn-primary">{{ __('View') }}</a>
                            </td>
                        </tr>
                        <tr>
                            <th>Kandy, Home...</th>
                            <td>03-07-2020 10:24 A.M</td>
                            <td>320Km</td>
                            <td>Rs 1500</td>
                            <td>
                                <a href="{{ route('user.view_rout') }}" class="btn btn-primary">{{ __('View') }}</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
        </div>

@endsection
