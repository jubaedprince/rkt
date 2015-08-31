@extends('layouts.master')

@section('title', 'Home')


{{--@section('sidebar')--}}
    {{--@parent--}}

    {{--<p>This is appended to the master sidebar.</p>--}}
{{--@endsection--}}

@section('content')
    {{--<p>This is my home content.</p>--}}
    {{--<p>Route name: {!!Route::currentRouteName()!!}</p>--}}
    <p>{!!Auth::user()->name!!}, <a href="/auth/logout">Logout</a></p>
    @if (Route::currentRouteName() === 'home')
        @include('forms.activity', ['cars' => $cars])


    @elseif (Route::currentRouteName() === 'process.ondayForm')
        @include('forms.onday', [])

    @elseif (Route::currentRouteName() === 'process.maintenanceForm')
        @include('forms.maintenance', [])

    @elseif (Route::currentRouteName() === 'process.nilForm')
        @include('forms.nil', [])

    @endif
<div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Truck</th>
            <th>Date</th>
            <th>Cost</th>
            <th>Fare</th>
            <th>Type</th>
            <th>Customer</th>
            <th>Market Price</th>
            <th>Type</th>
            <th>Origin</th>
            <th>Destination</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($activities as $activity)
            <tr>
                <td>{{ $activity->car->name }}</td>
                <td>{{ $activity->date->format('d-M-y')  }}</td>
                <td>৳ {!!number_format(floatval($activity->cost)) !!}</td>
                <td>৳ {{ number_format(floatval($activity->fare)) }}</td>
                <td>{{ $activity->type }}</td>
                @if($activity->type == "On Day")
                    {{--App\Customer::find($activity->onday['customer_id'])--}}
                    <td>{{$activity->onday->customer['name'] }}</td>
                    <td>৳ {{ number_format(floatval($activity->onday->market_price) )}}</td>
                    <td>@if($activity->onday->type == 1) Import
                        @elseif ($activity->onday->type == 0) Export
                        @elseif ($activity->onday->type == 2) Other
                        @endif
                    </td>
                    <td>{{ $activity->onday->location_origin->name }}</td>
                    <td>{{ $activity->onday->location_destination->name }}</td>
                @else  <td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>
                @endif
                <td>
                    <a href="/activity/{{ $activity->id }}/delete">
                        <button type="button" class="btn btn-default" aria-label="Remove">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </button>
                    </a>

                    <a href="/activity/{{ $activity->id }}/edit">
                        <button type="button" class="btn btn-default" aria-label="Edit">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        </button>
                    </a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

</div>
@endsection