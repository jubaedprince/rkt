@extends('layouts.master')

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="active">
        <strong>Monthly Cost Revenue</strong>
    </li>
</ol>
@endsection

@section('content')
    
    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Monthly Cost Revenue Comparison Graph Form</h5>
                </div>
                <div class="ibox-content" align="center">
                    {!! Form::open(array('url' => 'report/monthly-cost-revenue', 'method' => 'post' , 'class' => 'form-inline')) !!}
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
                            {!! Form::select('month',['1'=>'January', '2'=>'February', '3'=>'March', '4'=>'April', '5'=>'May', '6'=>'June', '7'=>'July', '8'=>'August', '9'=>'September', '10'=>'October', '11'=>'November', '12'=>'Decembers'], Carbon\Carbon::now()->format('m'), array('class' => 'chosen-select' , 'style' => 'width:222px;')) !!}
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="font-noraml">Select Year</label>
                        <div class="input-group">
                            {!! Form::select('year', ['2014' => '2014', '2015' => '2015', '2016' => '2016'  ],  Carbon\Carbon::now()->format('Y'), array('class' => 'chosen-select' , 'style' => 'width:222px;')) !!}
                        </div>
                    </div>

                    <div class="form-group" style="padding: 20px">
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection