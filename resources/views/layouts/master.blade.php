<html>
<head>
    <link href="{{ asset('components/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <title>Rubaiyat Kamal Transport - @yield('title')</title>
</head>
<body>
@section('sidebar')
    This is the master sidebar.
@show

<div class="container">
    @yield('content')
    @include('forms.activity')
</div>
</body>
</html>