@extends('layouts.master')
@section('content')
    <div class="row">
        <a href="/hr/employee/create">
            <button type="button" class="btn btn-default ">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Employee
            </button>
        </a>
    </div>
    <br>

    <div class="row">
        Sort By: <a href="/hr/employee?sort=name">Name</a><a href="/hr/employee?sort=id">ID</a> <a href="/hr/employee?sort=status_asc">Inactive</a>  <a href="/hr/employee?sort=status_dsc">Active</a>
    </div>

    <br>
    <div class="row">
        <table class="table table-bordered">
            <th>ID</th>
            <th>Name</th>
            <th>RKT/Amtranet ID</th>
            <th>Designation</th>
            <th>Mobile</th>
            <th>Status</th>


            @if(count($employees)>0)
                @foreach($employees as $employee)
                <tr>
                    <td>{{$employee->id}}</td>
                    <td><a href="/hr/employee/{{$employee->id}}">{{$employee->name}}</a></td>
                    <td>{{$employee->raid}}</td>
                    <td>{{$employee->designation}}</td>
                    <td>{{$employee->mobile}}</td>
                    <td>
                        @if($employee->status==true)
                            Active
                        @else
                            Inactive
                        @endif
                    </td>
                </tr>
                @endforeach
            @endif

        </table>
    </div>

@endsection