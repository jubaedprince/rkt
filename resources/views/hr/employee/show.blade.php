@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5  toppad  pull-right col-md-offset-3 pull-left">
                <a href="/hr/employee" >Back</a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{$employee->name}}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="/{{$employee->photo}}" class="img-responsive"> </div>

                            <div class=" col-md-9 col-lg-9 ">
                                <table class="table table-user-information">
                                    <tbody>

                                    <tr>
                                        <td>ID</td>
                                        <td>{{$employee->id}}</td>
                                    </tr>

                                    <tr>
                                        <td>Designation:</td>
                                        <td>{{$employee->designation}}</td>
                                    </tr>

                                    <tr>
                                        <td>National ID</td>
                                        <td>{{$employee->national_id}}</td>
                                    </tr>

                                    <tr>
                                        <td>RKT/Amtranet ID</td>
                                        <td>{{$employee->raid}}</td>
                                    </tr>
                                    <tr>
                                        <td>Present Address</td>
                                        <td>{{$employee->present_address}}</td>
                                    </tr>

                                    <tr>
                                        <td>Permanent Address</td>
                                        <td>{{$employee->permanent_address}}</td>
                                    </tr>

                                    <tr>
                                        <td>Status</td>
                                        <td>
                                            @if($employee->status==true)
                                                Active
                                            @else
                                                Inactive
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Email</td>
                                        <td><a href="mailto:{{$employee->email}}">{{$employee->email}}</a></td>
                                    </tr>
                                    <td>Mobile Number</td>
                                    <td>{{$employee->mobile}}</td>

                                    </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    {!! Form::open(array('route' => array('hr.employee.destroy', $employee->id), 'method' => 'delete')) !!}
                    <div class="panel-footer">
                        <a href="/hr/employee/{{$employee->id}}/edit" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                        <button data-original-title="Remove this user" data-toggle="tooltip" type="submit" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection