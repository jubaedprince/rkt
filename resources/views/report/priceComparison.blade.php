@extends('layouts.master')

<<<<<<< HEAD
@section('title', 'Fare comparison graph')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Generate Fare Comparison Report Form</h5>
                </div>
                <div class="ibox-content" align="center">
                    {!! Form::open(array('url' => 'report/price-comparison', 'method' => 'post' , 'class' => 'form-group')) !!}
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form-group col-md-12">
                        <label class="font-noraml">Select Month</label>
                        <div class="input-group">
                            {!! Form::select('month',['1'=>'Jan', '2'=>'Feb', '3'=>'Mar', '4'=>'Apr', '5'=>'May', '6'=>'Jun', '7'=>'Jul', '8'=>'Aug', '9'=>'Sep', '10'=>'Oct', '11'=>'Nov', '12'=>'Dec'], 8, array('class' => 'chosen-select' , 'style' => 'width:222px;')) !!}
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="font-noraml">Select Year</label>
                        <div class="input-group">
                            {!! Form::select('year', ['2014' => '2014', '2015' => '2015', '2016' => '2016'  ], 2015, array('class' => 'chosen-select' , 'style' => 'width:222px;')) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{{$date}} |
                    @if($rate>0)
                            Rate Change: <br>
                        <text style="color: blue">▲</text> {{abs(round($rate,2))}} %
                    @else
                            Rate Change:
                        <text style="color: red">▼</text> {{abs(round($rate,2))}} %
                    @endif
                    </h5>
                </div>

                <div class="ibox-content">
                    <canvas id="canvas" width="701%" height="444px"></canvas>
                </div>
            </div>
        </div>
    </div>

    

=======
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
>>>>>>> ba38af57468d93813d9c6f7a655537cce4f5374d
    <script type="text/javascript" src="{{ URL::asset('components/js/ChartNew.js') }}"></script>

<<<<<<< HEAD
=======
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
>>>>>>> ba38af57468d93813d9c6f7a655537cce4f5374d
    <script>
        var linedata = {
            labels: {!! json_encode($dates) !!},
            graphTitle : "Sinus - Cosinus",
            datasets : [
<<<<<<< HEAD
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
=======
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
>>>>>>> ba38af57468d93813d9c6f7a655537cce4f5374d
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

<<<<<<< HEAD
=======
    <div align="center">
        <canvas id="canvas" height="444px" width="1111px"></canvas>
    </div>

>>>>>>> ba38af57468d93813d9c6f7a655537cce4f5374d
    <script>
        window.onload = function() {
            new Chart(document.getElementById("canvas").getContext("2d")).Line(linedata, opt1);
        }
    </script>
@endsection