<div class="col-lg-7">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>On Day Form</h5>
            <div class="ibox-tools">
                <a href="#">
                    Truck: <div class="badge badge-primary">{!! $activity->car->name !!}</div>
                </a>
                <a href="#">
                    Date: <div class="badge badge-primary">{!! $activity->date->format('d-M-y') !!}</div>
                </a>

                <a href="/activity/{{ $activity->id }}/delete" class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
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
                <div class="col-sm-6 b-r">
                    {!! Form::open(array('url' => 'process/onday', 'method' => 'post')) !!}
                    <input type="hidden" value="{!!  $activity->id !!}" name="activity_id">
                    <div class="form-group">
                        <label>Select Type</label>
                        <br>
                        {!! Form::select('type', ['1'=>'Import' , '0' => 'Export', '2' => 'Other'], null, array('class' => 'chosen-select' , 'style' => 'width:250px;')) !!}
                    </div>
                    <div class="form-group">
                        <label>Select Customer</label>
                        <br>
                        {!! Form::select('customer', $customers, null, array('class' => 'chosen-select' , 'style' => 'width:250px;')) !!}
                    </div>
                    <div class="form-group">
                        <label>Select Origin</label>
                        <br>
                        {!! Form::select('location_id_origin', $locations, null, array('class' => 'chosen-select' , 'style' => 'width:250px;')) !!}
                    </div>
                    <div class="form-group">
                        <label>Select Destination</label>
                        <br>
                        {!! Form::select('location_id_destination', $locations, null, array('class' => 'chosen-select' , 'style' => 'width:250px;')) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <!-- <label>Type Cost</label>  -->
                        {!! Form::text('cost', null, array('class' => 'form-control' , 'placeholder' => 'Type Cost')) !!}
                    </div>
                    <div class="form-group">
                        <!-- <label>Type Fare</label> -->
                        {!! Form::text('fare', null, array('class' => 'form-control' , 'placeholder' => 'Type Fare')) !!}
                    </div>
                    <div class="form-group">
                        <!-- <label>Type Market Price</label> -->
                        {!! Form::text('market_price', null, array('class' => 'form-control' , 'placeholder' => 'Type Market Price')) !!}
                    </div>
                    @foreach ($ondayOtherCostItems as $key => $value)
                        <div class="form-group">
                            <!-- {!! Form::label('other_cost['.$key.']', $value) !!} -->
                            {!! Form::text('other_cost['.$key.']', null, array('class' => 'form-control' , 'placeholder' => 'Type ' . $value)) !!}
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Comment</label>
                        {!! Form::text('comment', null, array('class' => 'form-control' , 'placeholder' => 'Type Comment')) !!}
                    </div>
                    <div>
                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit">
                            <strong>Submit</strong>
                        </button>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@if(Auth::user()->isAdmin())
    <div class="col-lg-5">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Add Other Cost Item Form</h5>
            </div>
            <div class="ibox-content">
                {!! Form::open(array('url' => '/process/onday/other-cost-item', 'method' => 'post' , 'class' => 'form-horizontal')) !!}
                <div class="form-group">
                    <div class="col-lg-9">
                        {!! Form::text('name', null, array('class' => 'form-control' , 'placeholder' => 'Other Cost Item Name')) !!}
                    </div>
                    <div class="col-lg-2">
                        <button class="btn btn-sm btn-white" type="submit">Add Item</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endif


















{{--<div class="col-md-8" style="background-color: #dedef8; border-radius:5px; padding: 20px">--}}

    {{--<a href="/activity/{{ $activity->id }}/delete">--}}
        {{--<button type="button" class="btn btn-default" aria-label="Close">--}}
            {{--<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>--}}
        {{--</button>--}}
    {{--</a>--}}

    {{--<h1>On Day Form</h1>--}}

    {{--{!! Form::open(array('url' => 'process/onday', 'method' => 'post', 'class'=>'form-inline')) !!}--}}
    {{--@if (count($errors) > 0)--}}
        {{--<div class="alert alert-danger">--}}
            {{--<ul>--}}
                {{--@foreach ($errors->all() as $error)--}}
                    {{--<li>{{ $error }}</li>--}}
                {{--@endforeach--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--@endif--}}
    {{--{!! Form::hidden('activity_id', $activity->id) !!}--}}

    {{--<div class="form-group">--}}
        {{--<label class="col-sm-2 control-label">Truck </label>--}}
        {{--<div class="col-sm-10">--}}
            {{--<p class="form-control-static">{!! $activity->car->name !!} </p>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
        {{--<label class="col-sm-2 control-label">Date </label>--}}
        {{--<div class="col-sm-10">--}}
            {{--<p class="form-control-static"> {!! $activity->date->format('d-M-y') !!}</p>--}}
        {{--</div>--}}
    {{--</div>--}}


    {{--<div class="form-group">--}}
        {{--{!! Form::label('type', 'Type', ['class'=> 'col-sm-2 control-label']) !!}--}}
        {{--<div class="col-sm-11">--}}
            {{--{!! Form::select('type', ['1'=>'Import' , '0' => 'Export', '2' => 'Other'], null, array('class' => 'form-control', 'autofocus'=>'autofocus')) !!}--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
        {{--{!! Form::label('customer', 'Customer', ['class'=> 'col-sm-2 control-label']) !!}--}}
        {{--<div class="col-sm-11">--}}
            {{--{!! Form::select('customer', $customers, null, array('class' => 'form-control')) !!}--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<br>--}}

    {{--<div class="form-group">--}}
        {{--{!! Form::label('location_id_origin', 'Origin',  ['class'=> 'col-sm-2 control-label']) !!}--}}
        {{--<div class="col-sm-11">--}}
            {{--{!! Form::select('location_id_origin', $locations, null, array('class' => 'form-control')) !!}--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
        {{--{!! Form::label('location_id_destination', 'Destination',  ['class'=> 'col-sm-2 control-label']) !!}--}}
        {{--<div class="col-sm-11">--}}
            {{--{!! Form::select('location_id_destination', $locations, null, array('class' => 'form-control')) !!}--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<br><br>--}}


        {{--<div class="form-group">--}}
            {{--{!! Form::label('cost', 'Cost',  ['class'=> 'col-sm-2 control-label']) !!}--}}
            {{--<div class="col-md-11">--}}
                {{--{!! Form::text('cost', null, array('class' => 'form-control')) !!}--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="form-group" style="margin-left: -65px">--}}
            {{--{!! Form::label('fare', 'Fare',  ['class'=> 'col-sm-2 control-label']) !!}--}}
            {{--<div class="col-md-11">--}}
                {{--{!! Form::text('fare', null, array('class' => 'form-control')) !!}--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<br><br>--}}

        {{--<div class="form-group">--}}
            {{--{!! Form::label('market_price', 'Market Price',  ['class'=> 'col-sm-5 control-label']) !!}--}}
            {{--<div class="col-md-11">--}}
                {{--{!! Form::text('market_price', null, array('class' => 'form-control')) !!}--}}
            {{--</div>--}}
        {{--</div>--}}

    {{--<br><br>--}}

    {{--@foreach ($ondayOtherCostItems as $key => $value )--}}
        {{--<div class="form-group">--}}
            {{--{!! Form::label('other_cost['.$key.']', $value,  ['class'=> 'col-sm-5 control-label']) !!}--}}
            {{--<div class="col-md-11">--}}
                {{--{!! Form::text('other_cost['.$key.']', null, array('class' => 'form-control')) !!}--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--@endforeach--}}

    {{--<div class="form-group">--}}
        {{--{!! Form::label('comment', 'Comment',  ['class'=> 'col-sm-2 control-label']) !!}--}}
        {{--<div class="col-sm-11">--}}
            {{--{!! Form::textArea('comment', null, array('class' => 'form-control')) !!}--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--{!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}--}}

    {{--{!! Form::close() !!}--}}

    {{--@if(Auth::user()->isAdmin())--}}
        {{--add other cost item form --}}
        {{--{!! Form::open(array('url' => '/process/onday/other-cost-item', 'method' => 'post', 'class'=>'form-inline')) !!}--}}

        {{--<div class="form-group">--}}
            {{--{!! Form::label('name', 'Other Cost Item Name',  ['class'=> 'col-sm-5 control-label']) !!}--}}
            {{--<div class="col-md-11">--}}
                {{--{!! Form::text('name', null, array('class' => 'form-control')) !!}--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--{!! Form::submit('Add Item', ['class' => 'btn btn-default']) !!}--}}

        {{--{!! Form::close() !!}--}}
    {{--@endif--}}
{{--</div>--}}