@extends('layouts.master')
@section('content')
    <div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Truck</th>
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

            @foreach ($activities as $key => $activities)
                <tr><th>{{$key}}</th></tr>

                @foreach ($activities as $activity)
                    <tr>
                        <td>{{ $activity->car->name }}</td>
                        <td>৳ {!!number_format(floatval($activity->cost)) !!}</td>
                        <td>৳ {{ number_format(floatval($activity->fare)) }}</td>
                        <td>{{ $activity->type }}</td>
                        @if($activity->type == "On Day")
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

                        @if(Auth::user()->isAdmin())
                            <td>
                                @if($activity->type == "Maintenance")
                                    @if($activity->maintenance->upload != null)
                                        <a target="_blank"  href="{{URL ::to('/').$activity->maintenance->upload}}">Upload</a>
                                    @endif
                                @endif

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
                        @endif
                    </tr>
                @endforeach
                <br>
            @endforeach

            </tbody>
        </table>

    </div>
@endsection