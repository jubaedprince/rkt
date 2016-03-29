@extends('layouts.master')

@section('title', 'Activity List')

@section('content')

@foreach ($activities as $key => $activities)
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>{{$key}}</h5>
        </div>
        <div class="ibox-content">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
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
                        <th>Action</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody> 
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
                                <a href="/activity/{{ $activity->id }}/delete">
                                    <button type="button" class="btn btn-default btn-delete" aria-label="Remove">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button>
                                </a>

                                <a href="/activity/{{ $activity->id }}/edit">
                                    <button type="button" class="btn btn-default btn-edit" aria-label="Edit">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    </button>
                                </a>
                            </td>
                        @endif
                        <td>
                            @if($activity->type == "Maintenance")
                                @if($activity->maintenance->upload != null)
                                    <a target="_blank"  href="{{URL ::to('/').$activity->maintenance->upload}}">Upload</a>
                                @endif
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endforeach

@endsection