@section('title', 'Onday form')

<div class="col-lg-7">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>On Day Form</h5>
            <div class="ibox-tools" style="font-size: 15px">
                <a href="#">
                    Truck: <div class="badge badge-primary" style="font-size: 15px">{!! $activity->car->name !!}</div> 
                </a>
                <a href="#">
                    Date: <div class="badge badge-primary" style="font-size: 15px">{!! $activity->date->format('d-M-y') !!}</div>
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
            {!! Form::hidden('activity_id', $activity->id) !!}
            <div class="row">
                <div class="col-sm-6 b-r">
                    {!! Form::open(array('url' => 'process/onday', 'method' => 'post')) !!}
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

















