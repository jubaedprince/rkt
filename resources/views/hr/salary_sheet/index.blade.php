@extends('layouts.master')

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="active">
        <strong>Salary Sheet</strong>
    </li>
</ol>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/hr/salary_sheet/create">
                <button type="button" class="btn btn-primary pull-right">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create New Salary Sheet
                </button>
            </a>
        </div>
    </div>

    <br>

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Salary Sheet</h5>
        </div>
        <div class="ibox-content">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody> 
                @if(count($salary_sheets)>0)
                    @foreach($salary_sheets as $salary_sheet)
                        <tr>
                            <td>{{$salary_sheet->id}}</td>
                            <td><a href="/hr/salary_sheet/{{$salary_sheet->id}}">{{$salary_sheet->date->toFormattedDateString()}}</a> </td>
                            <td>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['hr.salary_sheet.destroy', $salary_sheet->id]]) !!}
                                {!!Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection