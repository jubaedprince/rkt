<html>
<head>

    <link href="{{ asset('components/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <title>Rubaiyat Kamal Transport - @yield('title')</title>
</head>
<body>
@section('sidebar')

@show

<div class="container">
    <br>
    @if (Auth::check())
        {{--Navigation bar--}}
        <ul class="nav nav-pills">
            <li class = "{{ Request::is('home') ? 'active' : '' }}"><a href="/home">Home </a></li>
            <li  class = "{{ Request::is('report/*') ? 'dropdown active' : 'dropdown' }}" role="presentation">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    Report <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="/report/price-comparison">Price Comparison</a></li>
                    <li><a href="/report/monthly-cost-revenue">Monthly Cost-Revenue</a></li>
                    <li><a href="#">Detailed Truck Report</a></li>
                </ul>
            </li>
            <li  class = "{{ Request::is('car-status') ? 'active' : '' }}" ><a href="/car-status">Car Status</a></li>
            <li  class = "{{ Request::is('activity-list') ? 'active' : '' }}" ><a href="/activity-list">Activity List</a></li>
        </ul>

        {{--navigation bar ends--}}
    @endif
    <br>
    @yield('content')
</div>
<script type="text/javascript" src="{{ URL::asset('components/js/jquery-1.11.3.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('components/bootstrap/js/bootstrap.min.js') }}"></script>

</body>
</html>