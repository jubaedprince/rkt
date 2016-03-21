{{--@extends('layouts.master')--}}
{{--@section('content')--}}
    {{--<div class="col-md-8" style="background-color: #dedef8; border-radius:5px; padding: 20px">--}}
        {{--<h1>Generate Fare Comparison Report Form</h1>--}}
        {{--{!! Form::open(array('url' => 'report/price-comparison', 'method' => 'post')) !!}--}}
        {{--{!! Form::label('month', 'Month') !!}--}}
        {{--{!! Form::select('month',['1'=>'Jan', '2'=>'Feb', '3'=>'Mar', '4'=>'Apr', '5'=>'May', '6'=>'Jun', '7'=>'Jul', '8'=>'Aug', '9'=>'Sep', '10'=>'Oct', '11'=>'Nov', '12'=>'Dec'], 8, array('class' => 'form-control')) !!}--}}
        {{--<br>--}}
        {{--{!! Form::label('year', 'Year') !!}--}}
        {{--{!! Form::select('year', ['2014' => '2014', '2015' => '2015', '2016' => '2016'  ], 2015, array('class' => 'form-control')) !!}--}}
        {{--<br>--}}
        {{--{!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}--}}

        {{--{!! Form::close() !!}--}}
    {{--</div>--}}
{{--@endsection--}}

@extends('layouts.master')

@section('content')

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Generate Fare Comparison Report Form</h5>
        </div>
        <div class="ibox-content">
            {!! Form::open(array('url' => 'report/price-comparison', 'method' => 'post' , 'class' => 'form-inline')) !!}
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group col-md-4">
                <label class="font-noraml">Select Month</label>
                <div class="input-group">
                    {!! Form::select('month',['1'=>'Jan', '2'=>'Feb', '3'=>'Mar', '4'=>'Apr', '5'=>'May', '6'=>'Jun', '7'=>'Jul', '8'=>'Aug', '9'=>'Sep', '10'=>'Oct', '11'=>'Nov', '12'=>'Dec'], 8, array('class' => 'chosen-select' , 'style' => 'width:222px;')) !!}
                </div>
            </div>

            <div class="form-group col-md-4">
                <label class="font-noraml">Select Year</label>
                <div class="input-group">
                    {!! Form::select('year', ['2014' => '2014', '2015' => '2015', '2016' => '2016'  ], 2015, array('class' => 'chosen-select' , 'style' => 'width:222px;')) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection