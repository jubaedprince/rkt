@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5  toppad  pull-right col-md-offset-3 pull-left">
                <a href="/hr/salary_sheet">Back</a>
            </div>
        </div>

        @if(count($salary_sheet->salarySheetRecords) > 0)
            <h2>Salary Sheet</h2>
            <p>{{$salary_sheet->date->toFormattedDateString()}}</p>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Basic Salary</th>
                    <th>Allowance</th>

                    <th>Conveyence</th>
                    <th>Gross Salary</th>
                    <th>Total Advance</th>

                    <th>Previous Advance Balance</th>
                    <th>Deduction this Month</th>
                    <th>Rest Advance</th>

                    <th>Net Payable</th>
                    <th>Status</th>
                    <th>Pay Date</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
            @foreach($salary_sheet->salarySheetRecords as $salary_sheet_record)
                <tr>
                    <td>{{$salary_sheet_record->employee->name}}</td>
                    <td>{{$salary_sheet_record->basic_salary}}</td>
                    <td>{{$salary_sheet_record->allowance}}</td>

                    <td>{{$salary_sheet_record->conveyance}}</td>
                    <td>{{$salary_sheet_record->gross_salary}}</td>
                    <td>{{$salary_sheet_record->total_advance}}</td>

                    <td>{{$salary_sheet_record->previous_advance_balance}}</td>
                    <td>{{$salary_sheet_record->deduction_this_month}}</td>
                    <td>{{$salary_sheet_record->rest_advance}}</td>

                    <td>{{$salary_sheet_record->net_payable}}</td>
                    <td>
                        @if($salary_sheet_record->paid == 1)
                            Paid
                        @else
                            Unpaid
                        @endif
                    </td>
                    <td>{{$salary_sheet_record->pay_date->toDateString()}}</td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['hr.salary_sheet.salary_sheet_records.destroy', $salary_sheet->id, $salary_sheet_record->id ]]) !!}
                        {!!Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
                </tbody>
            </table>
        @endif
        <div class="row">
            {!! Form::open(array('route' => 'hr.salary_sheet.salary_sheet_records.store', 'method' => 'post', 'files'=>true)) !!}
            {!! Form::hidden('salary_sheet_id', $salary_sheet->id, array('class' => 'form-control')) !!}

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
                {!! Form::label('employee_id', 'Employee', ['class'=> 'col-sm-2 control-label']) !!}
                {!! Form::select('employee_id', $employees, Input::old('employee_id'), array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('basic_salary', 'Basic Salary') !!}
                {!! Form::text('basic_salary', Input::old('basic_salary'), array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('allowance', 'Allowance') !!}
                {!! Form::text('allowance', Input::old('allowance'), array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('conveyance', 'Conveyance') !!}
                {!! Form::text('conveyance', Input::old('conveyance'), array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('gross_salary', 'Gross Salary') !!}
                {!! Form::text('gross_salary', Input::old('gross_salary'), array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('total_advance', 'Total Advance') !!}
                {!! Form::text('total_advance', Input::old('total_advance'), array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('previous_advance_balance', 'Previous Advance Balance') !!}
                {!! Form::text('previous_advance_balance', Input::old('previous_advance_balance'), array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('deduction_this_month', 'Deduction this Month') !!}
                {!! Form::text('deduction_this_month', Input::old('deduction_this_month'), array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('rest_advance', 'Rest Advance') !!}
                {!! Form::text('rest_advance', Input::old('rest_advance'), array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('net_payable', 'Net Payable') !!}
                {!! Form::text('net_payable', Input::old('net_payable'), array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('paid', 'Status') !!}
                {!! Form::select('paid', array('1' => 'Paid', '0' => 'Unpaid'), '1', array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('pay_date', 'Pay Date') !!}
                {!! Form::input('date', 'pay_date', Carbon\Carbon::now()->format('Y-m-d') , array('class' => 'form-control')) !!}

            </div>

            {!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection