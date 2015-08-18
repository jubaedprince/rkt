@extends('layouts.master')

@section('title', 'Home')


{{--@section('sidebar')--}}
    {{--@parent--}}

    {{--<p>This is appended to the master sidebar.</p>--}}
{{--@endsection--}}

@section('content')
    {{--<p>This is my home content.</p>--}}
    {{--<p>Route name: {!!Route::currentRouteName()!!}</p>--}}
    <p>{!!Auth::user()->name!!}, <a href="/auth/logout">Logout</a></p>
    @if (Route::currentRouteName() === 'home')
        @include('forms.activity', ['cars' => $cars])


    @elseif (Route::currentRouteName() === 'process.ondayForm')
        @include('forms.onday', [])

    @elseif (Route::currentRouteName() === 'process.maintenanceForm')
        @include('forms.maintenance', [])

    @elseif (Route::currentRouteName() === 'process.nilForm')
        @include('forms.nil', [])

    @endif
<div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Truck</th>
            <th>Date</th>
            <th>Type</th>
            <th>Cost</th>
            <th>Fare</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($activities as $activity)
            <tr>
                <td>{{ $activity->car->name }}</td>
                <td>{{ $activity->date }}</td>
                <td>{{ $activity->type }}</td>
                <td>৳ {{ $activity->cost }}</td>
                <td>৳ {{ $activity->fare }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>

</div>
@endsection