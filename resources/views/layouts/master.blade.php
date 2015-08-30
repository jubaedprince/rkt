<html>
<head>
    <link href="{{ asset('components/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <title>Rubaiyat Kamal Transport - @yield('title')</title>
</head>
<body>
@section('sidebar')
    @if (Auth::check())
    <br>
    <div class="col-md-4 col-md-offset-1">
    <a href="/home" class="btn btn-default" role="button">Home</a>
    <a href="/report" class="btn btn-default" role="button">Report</a>
        <a href="/car-status" class="btn btn-default" role="button">Car Status</a>
        <br>
        <br>
    </div>
    @endif
@show

<div class="container">
    @yield('content')
</div>
</body>
</html>