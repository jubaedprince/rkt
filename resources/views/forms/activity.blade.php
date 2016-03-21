{{--<div class="col-md-8" style="background-color: #dedef8; border-radius:5px; padding: 20px">--}}
    {{--<h1>Activity Form</h1>--}}

    {{--{!! Form::open(array('url' => 'process/', 'method' => 'post')) !!}--}}
    {{--@if (count($errors) > 0)--}}
        {{--<div class="alert alert-danger">--}}
            {{--<ul>--}}
                {{--@foreach ($errors->all() as $error)--}}
                    {{--<li>{{ $error }}</li>--}}
                {{--@endforeach--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--@endif--}}

    {{--<div class="form-group">--}}
        {{--{!! Form::label('car', 'Car') !!}--}}
        {{--{!! Form::select('car', $cars, null, array('class' => 'form-control')) !!}--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
        {{--{!! Form::label('date', 'Date') !!}--}}
        {{--{!! Form::input('date', 'date', Carbon\Carbon::now()->format('Y-m-d') , array('class' => 'form-control')) !!}--}}
    {{--</div>--}}



    {{--<div class="form-group">--}}
        {{--{!! Form::label('type', 'Type') !!}--}}
        {{--{!! Form::select('type', ['1'=>'On Day' , '3'=>'Off Day',  '2'=>'Maintenance'], null, array('class' => 'form-control')) !!}--}}
    {{--</div>--}}

    {{--{!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}--}}

    {{--{!! Form::close() !!}--}}
{{--</div>--}}


<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Activity Form</h5>
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
            <label class="font-normal">Date</label>
            <div class="input-group date">
                <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </span>
{{--                {!! Form::input('date', 'date', Carbon\Carbon::now()->format('Y-m-d') , array('class' => 'form-control')) !!}--}}
                <input name="date" type="text" class="form-control" value="{!!  Carbon\Carbon::now()->format('m/d/Y') !!}">
            </div>
        </div>

        <div class="form-group col-md-3">
            <label class="font-normal">Select Car</label>
            <div class="input-group">
                {!! Form::select('car', $cars, null, array('class' => 'chosen-select' , 'style' => 'width:150px;')) !!}
            </div>
        </div>

        <div class="form-group col-md-3">
            <label class="font-normal">Choose Day</label>
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
