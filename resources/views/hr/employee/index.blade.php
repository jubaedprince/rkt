@extends('layouts.master')

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="active">
        <strong>Employee Table</strong>
    </li>
</ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/hr/employee/create">
                <button type="button" class="btn btn-primary pull-right">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add new Employee
                </button>
            </a>
        </div>
    </div>

    <br>

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Employee Table</h5>
        </div>
        <div class="ibox-content">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>RKT/Amtranet ID</th>
                        <th>Designation</th>
                        <th>Mobile</th>
                        <th>Status</th>
                    </tr>
                </thead>
                
                <tbody> 
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
                </tbody>
            </table>
        </div>
    </div>
@endsection