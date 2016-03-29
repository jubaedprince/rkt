<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Activity form</h5>
    </div>
    <div class="ibox-content">
        {!! Form::open(array('url' => 'process/', 'method' => 'post' , 'class' => 'form-inline')) !!}
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="form-group col-md-4" id="data_1">
            <label class="font-noraml">Date</label>
            <div class="input-group date">
                <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </span>
                <input name="date" type="text" class="form-control" value="{{Carbon\Carbon::now()->format('m/d/Y')}}">
            </div>
        </div>

        <div class="form-group col-md-3">
            <label class="font-noraml">Select vehicle</label>
            <div class="input-group">
                {!! Form::select('car', $cars, null, array('class' => 'chosen-select' , 'style' => 'width:150px;')) !!}
            </div>
        </div>

        <div class="form-group col-md-3">
            <label class="font-noraml">Choose type</label>
            <div class="input-group">
                {!! Form::select('type', ['1'=>'On Day' , '3'=>'Off Day',  '2'=>'Maintenance'], null, array('class' => 'chosen-select' , 'style' => 'width:150px;')) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
