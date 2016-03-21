@extends('layouts.master')
@section('content')
    <h1>Add An Attachment</h1>

    {!! Form::open(array('url' => '/hr/employee/'. $employeeId . '/attachment', 'method' => 'POST', 'files'=>true)) !!}
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
        {!! Form::label('name', 'Name*') !!}
        {!! Form::text('name', Input::old('name'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('file', 'Browse File*') !!}
        {!! Form::file('file') !!}
    </div>

    {!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}

    {!! Form::close() !!}
@endsection