@extends('layouts.master')

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

    

    <script type="text/javascript" src="{{ URL::asset('components/js/ChartNew.js') }}"></script>

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

    <script>
        window.onload = function() {
            new Chart(document.getElementById("canvas").getContext("2d")).Line(linedata, opt1);
        }
    </script>
@endsection