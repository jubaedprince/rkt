@extends('layouts.master')
@section('content')

    {{--<div>--}}
    {{--<a href="#" class="btn btn-primary btn-lg" role="button">View</a>--}}
    {{--<a href="#" class="btn btn-primary btn-lg" role="button">Generate</a>--}}
    {{--</div>--}}


    <script type="text/javascript" src="{{ URL::asset('components/js/Chart.min.js') }}">alert("I am an alert box!");</script>
    <br><br><br><br>
    <div style="margin-left:300px "><canvas id="myChart" width="500" height="500"></canvas></div>

    <script>
        (function() {
            var ctx = document.getElementById('myChart').getContext('2d');

            var data = {
                labels: {!! json_encode($dates) !!},
                datasets: [
                    {
                        label: "My First dataset",
                        fillColor: "rgba(220,220,220,0.2)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data:   {!! json_encode($fare) !!}
                    },
                    {
                        label: "My Second dataset",
                        fillColor: "rgba(151,187,205,0.2)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        data: {!! json_encode($market_rate) !!}
                    }
                ]
            };

            new Chart(ctx).Line(data, {
                bezierCurve: false
            });
        })();
    </script>

@endsection