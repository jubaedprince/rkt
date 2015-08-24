<div class="col-md-8" style="background-color: #dedef8; border-radius:5px; padding: 20px">
    <h1>On Day Form</h1>

    {!! Form::open(array('url' => 'process/onday', 'method' => 'post', 'class'=>'form-inline')) !!}
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

    <div class="form-group">
        <label class="col-sm-2 control-label">Truck </label>
        <div class="col-sm-10">
            <p class="form-control-static">{!! $activity->car->name !!} </p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Date </label>
        <div class="col-sm-10">
            <p class="form-control-static"> {!! $activity->date->format('d-M-y') !!}</p>
        </div>
    </div>


    <div class="form-group">
        {!! Form::label('type', 'Type', ['class'=> 'col-sm-2 control-label']) !!}
        <div class="col-sm-11">
            {!! Form::select('type', ['1'=>'Import' , '0' => 'Export', '2' => 'Other'], null, array('class' => 'form-control', 'autofocus'=>'autofocus')) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('customer', 'Customer', ['class'=> 'col-sm-2 control-label']) !!}
        <div class="col-sm-11">
            {!! Form::select('customer', $customers, null, array('class' => 'form-control')) !!}
        </div>
    </div>

    <br>

    <div class="form-group">
        {!! Form::label('location_id_origin', 'Origin',  ['class'=> 'col-sm-2 control-label']) !!}
        <div class="col-sm-11">
            {!! Form::select('location_id_origin', $locations, null, array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('location_id_destination', 'Destination',  ['class'=> 'col-sm-2 control-label']) !!}
        <div class="col-sm-11">
            {!! Form::select('location_id_destination', $locations, null, array('class' => 'form-control')) !!}
        </div>
    </div>
    <br><br>


        <div class="form-group">
            {!! Form::label('cost', 'Cost',  ['class'=> 'col-sm-2 control-label']) !!}
            <div class="col-md-11">
                {!! Form::text('cost', null, array('class' => 'form-control')) !!}
            </div>
        </div>

        <div class="form-group" style="margin-left: -65px">
            {!! Form::label('fare', 'Fare',  ['class'=> 'col-sm-2 control-label']) !!}
            <div class="col-md-11">
                {!! Form::text('fare', null, array('class' => 'form-control')) !!}
            </div>
        </div>

        <br><br>

        <div class="form-group">
            {!! Form::label('market_price', 'Market Price',  ['class'=> 'col-sm-5 control-label']) !!}
            <div class="col-md-11">
                {!! Form::text('market_price', null, array('class' => 'form-control')) !!}
            </div>
        </div>

    <br><br>

    <div class="form-group">
        {!! Form::label('comment', 'Comment',  ['class'=> 'col-sm-2 control-label']) !!}
        <div class="col-sm-11">
            {!! Form::textArea('comment', null, array('class' => 'form-control')) !!}
        </div>
    </div>

    {!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}

    {!! Form::close() !!}
</div>