@extends('layouts.master')
@section('content')
    <div class="row">
        <a href="/hr/salary_sheet/create">
            <button type="button" class="btn btn-default ">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create New Salary Sheet
            </button>
        </a>
    </div>
    <br>

    <br>
    <div class="row">
        <table class="table table-bordered">
            <th>ID</th>
            <th>Date</th>
            <th>Action</th>


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

        </table>
    </div>

@endsection