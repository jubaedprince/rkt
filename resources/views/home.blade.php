@extends('layouts.master')

@section('breadcrumb')
 @if(Auth::user()->isAdmin() || Auth::user()->isUser())
        @if (Route::currentRouteName() === 'home')
            <ol class="breadcrumb">
                <li class="active">
                    <strong>Home</strong>
                </li>
            </ol>

        @elseif (Route::currentRouteName() === 'process.ondayForm')
             <ol class="breadcrumb">
                <li>
                    <a href="/home">Home</a>
                </li>
                <li class="active">
                    <strong>On Day</strong>
                </li>
            </ol>

        @elseif (Route::currentRouteName() === 'process.maintenanceForm')
            <ol class="breadcrumb">
                <li>
                    <a href="/home">Home</a>
                </li>
                <li class="active">
                    <strong>Maintainance</strong>
                </li>
            </ol>

        @elseif (Route::currentRouteName() === 'process.nilForm')
            <ol class="breadcrumb">
                <li>
                    <a href="/home">Home</a>
                </li>
                <li class="active">
                    <strong>Off Day</strong>
                </li>
            </ol>

        @endif
    @endif


@endsection

@section('content')
    @if(Auth::user()->isAdmin() || Auth::user()->isUser())
        @if (Route::currentRouteName() === 'home')
            @include('forms.activity', ['cars' => $cars])

        @elseif (Route::currentRouteName() === 'process.ondayForm')
            @include('forms.onday', [])

        @elseif (Route::currentRouteName() === 'process.maintenanceForm')
            @include('forms.maintenance', [])

        @elseif (Route::currentRouteName() === 'process.nilForm')
            @include('forms.nil', [])

        @endif
    @endif


    
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Last 10 Activities</h5>
        </div>

        <div class="ibox-content">
            <table id="example" class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                    <tr>
                        <th>Truck</th>
                        <th>Date</th>
                        <th>Cost</th>
                        <th>Fare</th>
                        <th>Activity Type</th>
                        <th>Customer</th>
                        <th>Market price</th>
                        <th>Type</th>
                        <th>Origin</th>
                        <th>Destination</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody> 
                    <!-- orderBy('name', 'desc') -->
                    @foreach ($activities as $activity)
                    <tr>
                        <td>{{ $activity->car->name }}</td>
                        <td>{{ $activity->date->format('d-M-y')  }}</td>
                        <td>৳ {!!number_format(floatval($activity->cost)) !!}</td>
                        <td>৳ {{ number_format(floatval($activity->fare)) }}</td>
                        <td>{{ $activity->type }}</td>
                        @if($activity->type == "On Day")
                            {{--App\Customer::find($activity->onday['customer_id'])--}}
                            <td>{{$activity->onday->customer['name'] }}</td>
                            <td>৳ {{ number_format(floatval($activity->onday->market_price) )}}</td>
                            <td>@if($activity->onday->type == 1) Import
                                @elseif ($activity->onday->type == 0) Export
                                @elseif ($activity->onday->type == 2) Other
                                @endif
                            </td>
                            <td>{{ $activity->onday->location_origin->name }}</td>
                            <td>{{ $activity->onday->location_destination->name }}</td>
                        @else  <td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>

                        @endif

                        @if(Auth::user()->isAdmin())
                            <td>
                                <a href="/activity/{{ $activity->id }}/edit">
                                    <button id="edit_btn" type="button" class="btn btn-default btn-edit" aria-label="Edit">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    </button>
                                </a>
                                
                                <!-- <a href="/activity/{{ $activity->id }}/delete"> -->
                                    <button onclick="areYouSureYouWantToDelete({{$activity->id}})" type="button" class="btn btn-default btn-delete" aria-label="Remove">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button>
                                <!-- </a> -->
                            </td>
                        @endif

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
  
    <script>

        function areYouSureYouWantToDelete(activity_id){

             swal({
              title: "Are you sure?",
              text: "You will not be able to recover this activity!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes, delete it!",
              closeOnConfirm: false
            },
            function(){
              swal("Deleted!", "Your activity has been deleted.", "success");
               window.location.href = "/activity/" + activity_id + "/delete";
            });
        }
       
    </script>

@endsection

