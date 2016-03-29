@extends('layouts.master')

@section('title', 'Edit activity list')

@section('content')
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                @if($activity->type === "On Day")
                <h5>On Day Edit Form</h5>
                @elseif($activity->type === "Maintenance")
                <h5>Maintenance Edit Form</h5>
                @elseif($activity->type === "Nil")
                <h5>Off Day Edit Form</h5>
                @endif

                <div class="ibox-tools" style="font-size: 13px">
                    <a href="#">
                        Truck: <div class="badge badge-primary" style="font-size: 13px">{!! $activity->car->name !!}</div> 
                    </a>
                    <a href="#">
                        Date: <div class="badge badge-primary" style="font-size: 13px">{!! $activity->date->format('d-M-y') !!}</div>
                    </a>
                    <a href="#">
                        Type: <div class="badge badge-primary" style="font-size: 13px">{!! $activity->type !!}</div>
                    </a>
                </div>
            </div>

            <div class="ibox-content">
                {!! Form::open(array('url' => '/activity/'.$activity->id, 'method' => 'put')) !!}
                {!! Form::hidden('activity_id', $activity->id) !!}
                {!! Form::hidden('activity_type', $activity->type) !!}
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if($activity->type === "On Day")
                    <div class="row">
                    @foreach($ondayOtherCosts as $ondayOtherCost)
                        <div class="form-group">
                            <div class="form-group">
                                {!! Form::label('other_cost['.$ondayOtherCost->onday_other_cost_item_id.']', App\OndayOtherCostItem::find($ondayOtherCost->onday_other_cost_item_id)->name,  ['class'=> 'col-sm-5 control-label']) !!}
                                <div class="col-md-11">
                                    {!! Form::text('other_cost['.$ondayOtherCost->onday_other_cost_item_id.']', $ondayOtherCost->cost, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                    @endforeach

                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('type', 'Type', ['class'=> 'col-sm-2 control-label']) !!}
                                <br>
                                <div class="col-sm-12">
                                    {!! Form::select('type', ['1'=>'Import' , '0' => 'Export', '2' => 'Other'],  $activity->onday->type, array('class' => 'chosen-select' , 'style' => 'width:300px;')) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('customer', 'Customer', ['class'=> 'col-sm-2 control-label']) !!}
                                <br>
                                <div class="col-sm-12">
                                    {!! Form::select('customer', $customers, $data->customer_id, array('class' => 'chosen-select' , 'style' => 'width:300px;')) !!}
                                </div>
                            </div>

                            <br>

                            <div class="form-group">
                                {!! Form::label('location_id_origin', 'Origin',  ['class'=> 'col-sm-2 control-label']) !!}
                                <br>
                                <div class="col-sm-12">
                                    {!! Form::select('location_id_origin', $locations, $data->location_id_origin, array('class' => 'chosen-select' , 'style' => 'width:300px;')) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('location_id_destination', 'Destination',  ['class'=> 'col-sm-2 control-label']) !!}
                                <br>
                                <div class="col-sm-12">
                                    {!! Form::select('location_id_destination', $locations, $data->location_id_destination, array('class' => 'chosen-select' , 'style' => 'width:300px;')) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('cost', 'Cost',  ['class'=> 'col-sm-2 control-label']) !!}
                                <div class="col-md-12">
                                    {!! Form::text('cost', $data->cost, array('class' => 'form-control')) !!}
                                </div>
                            </div>

                            <div class="form-group" >
                                {!! Form::label('fare', 'Fare',  ['class'=> 'col-sm-2 control-label']) !!}
                                <div class="col-md-12">
                                    {!! Form::text('fare', $data->fare, array('class' => 'form-control')) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('market_price', 'Market Price',  ['class'=> 'col-sm-5 control-label']) !!}
                                <div class="col-md-12">
                                    {!! Form::text('market_price', $data->market_price, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                    </div>    
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('comment', 'Comment',  ['class'=> 'col-sm-2 control-label']) !!}
                                <div class="col-sm-12">
                                    {!! Form::textArea('comment', $activity->comment, array('class' => 'form-control' , 'style' => 'resize:none')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-11"> 
                        {!! Form::submit('Update', ['class' => 'btn btn-primary pull-right']) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}

                @elseif($activity->type === "Maintenance")
                    @if(count($costs) > 0)
                    <div class="row">
                        <table class="table table-bordered" style="background-color: white">
                            <tr>
                                <th>Item</th>
                                <th>Cost</th>
                                <th>Action</th>
                            </tr>
                            @foreach($costs as $cost)
                                <tr>
                                    <td>{{$cost->name}}</td>
                                    <td>{{$cost->pivot->cost}}</td>
                                    <td>
                                        <a href="/process/maintenance/item/{{$cost->pivot->id}}/delete?maintenance_id={{$activity->maintenance->id}}">
                                            <button type="button" class="btn btn-default" aria-label="Delete">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    @endif

                    <div class="row">
                        <div class="form-group">
                            {!! Form::label('comment', 'Comment', ['class'=> 'col-sm-2 control-label']) !!}
                            <div class="col-md-12">
                                {!! Form::textArea('comment', $activity->comment, array('class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::submit('Update', ['class' => 'btn btn-primary pull-right']) !!}  
                        </div>
                    </div>

                    {!! Form::close() !!}

                    <hr>

                    {!! Form::open(array('url' => 'process/maintenance/item', 'method' => 'post')) !!}
                    {!! Form::hidden('maintenance_id', $activity->maintenance->id) !!}

                    <div class="row">
                        <div class="form-group">
                            {!! Form::label('item', 'Item', ['class'=> 'col-sm-2 control-label']) !!}
                            <div class="col-md-12">
                                {!! Form::select('item', $items, null, array('class' => 'chosen-select' , 'style' => 'width:700px;')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('cost', 'Cost', ['class'=> 'col-sm-2 control-label']) !!}
                            <div class="col-md-12">
                                {!! Form::text('cost', null, array('class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::submit('Edit item', ['class' => 'btn btn-primary pull-right']) !!}
                        </div>
                    </div> 
                    {!! Form::close() !!}

                    <hr>

                    {!! Form::open(array('url' => '/process/maintenance/item-name', 'method' => 'post')) !!}
                    {!! Form::hidden('maintenance_id', $activity->maintenance->id) !!}

                    <div class="row">
                        <div class="form-group">
                            {!! Form::label('name', 'Edit item name', ['class'=> 'col-sm-3 control-label']) !!}
                            <div class="col-md-12">
                                {!! Form::text('name', null, array('class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::submit('Edit new item', ['class' => 'btn btn-primary pull-right']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}

                @elseif($activity->type === "Nil")
                <div class="row">
                    <div class="form-group">
                        {!! Form::label('cost', 'Cost', ['class'=> 'col-sm-2 control-label']) !!}
                        <div class="col-md-12">
                            {!! Form::text('cost', $data->cost, array('class' => 'form-control')) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('comment', 'Comment', ['class'=> 'col-sm-2 control-label']) !!}
                        <div class="col-md-12">
                            {!! Form::textArea('comment', $activity->comment, array('class' => 'form-control' , 'style' => 'resize:none')) !!}
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12"> 
                    {!! Form::submit('Update', ['class' => 'btn btn-primary pull-right']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
                
                @endif
            </div> 
        </div>
    </div>
</div>
@endsection