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

            var chart = {
                labels:{!! json_encode($trucks) !!},
                datasets: [
            {
                label: "Cost",
                fillColor: "rgba(255,0,0,0.5)",
                strokeColor: "rgba(220,220,220,0.8)",
                highlightFill: "rgba(220,220,220,0.75)",
                highlightStroke: "rgba(220,220,220,1)",
                data: {!! json_encode($costs) !!}
            },
            {
                label: "Revenue",
                fillColor: "rgba(0,255,0,0.5)",
                strokeColor: "rgba(151,187,205,0.8)",
                highlightFill: "rgba(151,187,205,0.75)",
                highlightStroke: "rgba(151,187,205,1)",
                data: {!! json_encode($revenue) !!}
            }
        ]
            };

            var chart = new Chart(ctx).Bar(chart, {
                bezierCurve: false,
                scaleOverride : true,
                scaleSteps : 10,
                scaleStepWidth : 5000,
                scaleStartValue : 0,

            });
        })();
    </script>

@endsection