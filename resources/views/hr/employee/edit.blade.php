@extends('layouts.master')
@section('content')
    <h1>Edit Employee</h1>

    {!! Form::open(array('route' => array('hr.employee.update', $employee->id), 'method' => 'PUT', 'files'=>true))  !!}
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
        {!! Form::label('raid', 'RKT/Amtranet ID*') !!}
        {!! Form::text('raid', $employee->raid, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('name', 'Full Name*') !!}
        {!! Form::text('name', $employee->name, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('national_id', 'National ID*') !!}
        {!! Form::text('national_id', $employee->national_id, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('designation', 'Designation*') !!}
        {!! Form::text('designation', $employee->designation, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('mobile', 'Mobile*') !!}
        {!! Form::text('mobile', $employee->mobile, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::text('email', $employee->email, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('present_address', 'Present Address*') !!}
        {!! Form::text('present_address', $employee->present_address, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('permanent_address', 'Permanent Address*') !!}
        {!! Form::text('permanent_address', $employee->permanent_address, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('status', 'Status*') !!}
        {!! Form::select('status', array('1' => 'Active', '0' => 'Inactive'), $employee->status, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo', 'Photo') !!}
        {!! Form::file('photo') !!}
    </div>

    {!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}

    {!! Form::close() !!}
@endsection