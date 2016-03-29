@extends('layouts.master')
@section('content')
    <div class="col-md-8" style="background-color: #dedef8; border-radius:5px; padding: 20px">
        <h1>Edit Activity Form</h1>

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

        <div class="form-group">
            <label class="col-sm-2 control-label">Truck </label>
            <div class="col-sm-10">
                <p class="form-control-static">{!! $activity->car->name !!} </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Date </label>
            <div class="col-sm-10">
                <p class="form-control-static"> {!! $activity->date !!}</p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Type </label>
            <div class="col-sm-10">
                <p class="form-control-static"> {!! $activity->type !!}</p>
            </div>
        </div>

        @if($activity->type === "On Day")
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

        <div class="form-group">
            {!! Form::label('type', 'Type', ['class'=> 'col-sm-2 control-label']) !!}
            <div class="col-sm-11">
                {!! Form::select('type', ['1'=>'Import' , '0' => 'Export', '2' => 'Other'],  $activity->onday->type, array('class' => 'form-control')) !!}
            </div>
        </div>

            <div class="form-group">
                {!! Form::label('customer', 'Customer', ['class'=> 'col-sm-2 control-label']) !!}
                <div class="col-sm-11">
                    {!! Form::select('customer', $customers, $data->customer_id, array('class' => 'form-control')) !!}
                </div>
            </div>

            <br>

            <div class="form-group">
                {!! Form::label('location_id_origin', 'Origin',  ['class'=> 'col-sm-2 control-label']) !!}
                <div class="col-sm-11">
                    {!! Form::select('location_id_origin', $locations, $data->location_id_origin, array('class' => 'form-control')) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('location_id_destination', 'Destination',  ['class'=> 'col-sm-2 control-label']) !!}
                <div class="col-sm-11">
                    {!! Form::select('location_id_destination', $locations, $data->location_id_destination, array('class' => 'form-control')) !!}
                </div>
            </div>
            <br><br>


            <div class="form-group">
                {!! Form::label('cost', 'Cost',  ['class'=> 'col-sm-2 control-label']) !!}
                <div class="col-md-11">
                    {!! Form::text('cost', $data->cost, array('class' => 'form-control')) !!}
                </div>
            </div>

            <div class="form-group" >
                {!! Form::label('fare', 'Fare',  ['class'=> 'col-sm-2 control-label']) !!}
                <div class="col-md-11">
                    {!! Form::text('fare', $data->fare, array('class' => 'form-control')) !!}
                </div>
            </div>

            <br><br>

            <div class="form-group">
                {!! Form::label('market_price', 'Market Price',  ['class'=> 'col-sm-5 control-label']) !!}
                <div class="col-md-11">
                    {!! Form::text('market_price', $data->market_price, array('class' => 'form-control')) !!}
                </div>
            </div>

            <br><br>

            <div class="form-group">
                {!! Form::label('comment', 'Comment',  ['class'=> 'col-sm-2 control-label']) !!}
                <div class="col-sm-11">
                    {!! Form::textArea('comment', $activity->comment, array('class' => 'form-control')) !!}
                </div>
            </div>


            {!! Form::submit('Update', ['class' => 'btn btn-default']) !!}

            {!! Form::close() !!}

        @elseif($activity->type === "Maintenance")

            @if(count($costs) > 0)
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
            @endif


            {{--Maintenance form --}}
            <div class="form-group">
                {!! Form::label('comment', 'Comment') !!}
                {!! Form::textArea('comment', $activity->comment, array('class' => 'form-control')) !!}
            </div>


            {!! Form::submit('Update', ['class' => 'btn btn-default']) !!}

            {!! Form::close() !!}

            {{--add item form--}}
            {!! Form::open(array('url' => 'process/maintenance/item', 'method' => 'post')) !!}
            {!! Form::hidden('maintenance_id', $activity->maintenance->id) !!}

            <div class="form-group">
                {!! Form::label('item', 'Item') !!}
                {!! Form::select('item', $items, null, array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('cost', 'Cost') !!}
                {!! Form::text('cost', null, array('class' => 'form-control')) !!}
            </div>

            {!! Form::submit('Add Item', ['class' => 'btn btn-default']) !!}
            {!! Form::close() !!}


            {{--Add item name form --}}
            {!! Form::open(array('url' => '/process/maintenance/item-name', 'method' => 'post')) !!}
            {!! Form::hidden('maintenance_id', $activity->maintenance->id) !!}

            <div class="form-group">
                {!! Form::label('name', 'Item Name') !!}
                {!! Form::text('name', null, array('class' => 'form-control')) !!}
            </div>

            {!! Form::submit('Add Item Name', ['class' => 'btn btn-default']) !!}
            {!! Form::close() !!}


        @elseif($activity->type === "Nil")
            <div class="form-group">
                {!! Form::label('cost', 'Cost') !!}
                {!! Form::text('cost', $data->cost, array('class' => 'form-control')) !!}
            </div>


            <div class="form-group">
                {!! Form::label('comment', 'Comment') !!}
                {!! Form::textArea('comment', $activity->comment, array('class' => 'form-control')) !!}
            </div>

            {!! Form::submit('Update', ['class' => 'btn btn-default']) !!}

            {!! Form::close() !!}
        @endif


    </div>
@endsection