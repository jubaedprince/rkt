@extends('layouts.master')
@section('content')
    <h1>Create New Salary Sheet</h1>

    {!! Form::open(array('url' => '/hr/salary_sheet', 'method' => 'post')) !!}
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::label('month', 'Month') !!}
    {!! Form::select('month',['1'=>'Jan', '2'=>'Feb', '3'=>'Mar', '4'=>'Apr', '5'=>'May', '6'=>'Jun', '7'=>'Jul', '8'=>'Aug', '9'=>'Sep', '10'=>'Oct', '11'=>'Nov', '12'=>'Dec'], 1, array('class' => 'form-control')) !!}

    {!! Form::label('year', 'Year') !!}
    {!! Form::select('year', ['2014' => '2014', '2015' => '2015', '2016' => '2016' , '2017' => '2017'], 2016, array('class' => 'form-control')) !!}

    {!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}

    {!! Form::close() !!}
@endsection