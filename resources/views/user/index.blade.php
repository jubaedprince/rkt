@extends('layouts.master')

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="active">
        <strong>Users</strong>
    </li>
</ol>
@endsection

  

@section('content')
    @if(count($unapproved_users )>0)
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Pending Users</h5>
            </div>
            <div class="ibox-content">
                <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Company Name</th>
                            <th>Position</th>
                            <th>Type</th>
                            <th>Approval</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach ($unapproved_users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->company_name}}</td>
                                <td>{{$user->position}}</td>
                                <td>@if($user->type == null) viewer @else {{$user->type}}@endif</td>
                                <td>
                                    <a href="/users/approve/{{$user->id}}">
                                        <button type="button" class="btn btn-success btn-xs" aria-label="Ok">
                                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                        </button>
                                    </a>

                                    <a href="/users/reject/{{$user->id}}">
                                        <button type="button" class="btn btn-danger btn-xs" aria-label="Remove">
                                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Approved Users</h5>
            </div>
            <div class="ibox-content">
                <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Company Name</th>
                            <th>Position</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach ($approved_users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->company_name}}</td>
                                <td>{{$user->position}}</td>
                                <td>@if($user->type == null) viewer @else {{$user->type}}@endif</td>

                                <td>
                                    <!-- <a href="/users/reject/{{$user->id}}"> -->
                                        <button type="button" onclick="areYouSureYouWantToDelete({{$user->id}})" class="btn btn-danger btn-sm" aria-label="Remove">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    <!-- </a> -->
                                </td>

                            </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div> 
    @endif

    <script>

        function areYouSureYouWantToDelete(user_id){

             swal({
              title: "Are you sure?",
              text: "You will not be able to recover this action!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes, delete it!",
              closeOnConfirm: false
            },
            function(){
              swal("Deleted!", "Your user is rejected.", "success");
               window.location.href = "/users/reject/" + user_id;
            });
        }
       
    </script>
@endsection
