@extends('layouts.app')

@section('content')

    <div class="container mt-5">
    <div class="row">
        <!-- Content Row -->
        <div class="col">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">All Routs</h6>
                    <a href="/dashboard" class="anchorjs-link">{{ __('Dashboard') }}</a>
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
                                <td>
                                    <a href="{{ route('user.view_rout', $journey->id) }}" class="btn btn-primary">{{ __('View') }}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
        </div>

@endsection
