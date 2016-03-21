@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Activity List Monthwise</h5>
            </div>
            <div class="ibox-content">
                {!! Form::open(array('url' => 'activity-list', 'method' => 'get')) !!}
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="form-group col-md-5">
                        <label class="font-normal">Select Car</label>
                        <div class="input-group">
                            {!! Form::select('month',['1'=>'Jan', '2'=>'Feb', '3'=>'Mar', '4'=>'Apr', '5'=>'May', '6'=>'Jun', '7'=>'Jul', '8'=>'Aug', '9'=>'Sep', '10'=>'Oct', '11'=>'Nov', '12'=>'Dec'], $request->month, array('class' => 'chosen-select' , 'style' => 'width:222px;')) !!}
                        </div>
                    </div>

                    <div class="form-group col-md-5">
                        <label class="font-normal">Select Year</label>
                        <div class="input-group">
                            {!! Form::select('year', ['2014' => '2014', '2015' => '2015', '2016' => '2016'  ],  $request->year, array('class' => 'chosen-select' , 'style' => 'width:222px;')) !!}
                        </div>
                    </div>

                    <div class="form-group col-md-2">
                        <br>
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{--end of row/--}}

    @foreach ($activities as $key => $activityy)
        <div class="row">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{{$key}} / {{$request->month}} / {{$request->year}}</h5>
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

                        @foreach ($activityy as $activity)
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
        </div>
    @endforeach

@endsection