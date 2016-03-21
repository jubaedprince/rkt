@extends('layouts.master')

@section('content')
    <div class="col-md-4"></div>
    <div class="alert alert-info col-md-4" style="text-align: center">
        <h4 style="text-align: center">{{$date}}</h4>

        @if($rate>0)
            Rate Change: <br>
            ▲ {{abs(round($rate,2))}} %
        @else
            Rate Change:
            ▼ {{abs(round($rate,2))}} %
        @endif
    </div>

    {{--<script type="text/javascript" src="{{ URL::asset('components/js/Chart.min.js') }}"></script>--}}
    <script type="text/javascript" src="{{ URL::asset('components/js/ChartNew.js') }}"></script>
    <br><br>


    {{--<div style="margin-left:300px; height:620px; width:520px; border: 1px solid #add8e6; padding: 10px; ">--}}
    {{--<div id="my-doughnut-legend"></div>--}}
    {{--<canvas id="myChart" width="500" height="500"></canvas>--}}
    {{--</div>--}}



    <style>
        #my-doughnut-legend{
            float: center;
        }

        #my-doughnut-legend ul {
            list-style-type: none;
            width:200px;
            padding-top: 10px;
            padding-bottom: 10px;
            background: white;
            /*border:1px solid black;*/
        }

        #my-doughnut-legend li span {
            display: block;
            width: 14px;
            height: 14px;
            border-radius: 7px;
            float: left;
            margin-top: 4px;
            margin-right: 8px;
        }

        #my-doughnut-legend {
            list-style: none;
            margin: 0;
            padding: 0;
            font-size: 14px;
            margin-top : 20px;

        }

        #my-doughnut-legend li {
            margin-bottom : 4px;
        }

        #my-doughnut-legend li:first-letter {
            text-transform: capitalize;
        }

        .comm-how {
            display: inline-block;
            float : left;
            color : #979797;
            width : 25px;
            text-align: right;
            margin-right : 10px;
        }

    </style>
    <script>
        var linedata = {
            labels: {!! json_encode($dates) !!},
            graphTitle : "Sinus - Cosinus",
            datasets : [
                {
                    label: "RKT Fare",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data:   {!! json_encode($fare) !!}
                },
                {
                    label: "Market Fare",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: {!! json_encode($market_rate) !!}
                }
            ]
        }


        var opt1 = {
            canvasBorders : true,
            showTooltips: true,
            scaleLabel : "৳ <%=value%>",
            canvasBordersWidth : 1,
            canvasBordersColor : "black",
            datasetFill : false,
            legend : true,
            graphTitle : "RKT Fare and Market Fare Comparison",
            graphTitleFontSize: 18,
            bezierCurve: false


        }


    </script>

    <div align="center">
        <canvas id="canvas" height="444px" width="1111px"></canvas>
    </div>

    <script>
        window.onload = function() {
            new Chart(document.getElementById("canvas").getContext("2d")).Line(linedata, opt1
            );
        }
    </script>
@endsection