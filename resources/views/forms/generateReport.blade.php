@extends('layouts.master')
@section('content')
    <div class="col-md-8" style="background-color: #dedef8; border-radius:5px; padding: 20px">
    <h1>Generate Report Form</h1>

    {!! Form::open(array('url' => 'report', 'method' => 'post')) !!}
    {!! Form::label('type', 'Type') !!}
    {!! Form::select('type', ['1' => 'Monthly Cost-Revenue', '2' => 'Price Comparison', '3' => 'Detailed Truck Report'  ], 2015, array('class' => 'form-control')) !!}
    <br>
    {!! Form::label('month', 'Month') !!}
    {!! Form::select('month',['1'=>'Jan', '2'=>'Feb', '3'=>'Mar', '4'=>'Apr', '5'=>'May', '6'=>'Jun', '7'=>'Jul', '8'=>'Aug', '9'=>'Sep', '10'=>'Oct', '11'=>'Nov', '12'=>'Dec'], 8, array('class' => 'form-control')) !!}
    <br>
    {!! Form::label('year', 'Year') !!}
    {!! Form::select('year', ['2014' => '2014', '2015' => '2015', '2016' => '2016'  ], 2015, array('class' => 'form-control')) !!}
    <br>
    {!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}

    {!! Form::close() !!}
</div>
@endsection