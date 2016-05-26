@extends('layouts.master')

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="active">
        <strong>Monthly cost-revenue</strong>
    </li>
</ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Monthly Cost Revenue Comparison Graph Form</h5>
                </div>
                <div class="ibox-content" align="center">
                    {!! Form::open(array('url' => 'report/monthly-cost-revenue', 'method' => 'post' , 'class' => 'form-inline')) !!}
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form-group col-md-4">
                        <label class="font-noraml">Select Month</label>
                        <div class="input-group">
                            {!! Form::select('month',['1'=>'January', '2'=>'February', '3'=>'March', '4'=>'April', '5'=>'May', '6'=>'June', '7'=>'July', '8'=>'August', '9'=>'September', '10'=>'October', '11'=>'November', '12'=>'Decembers'], Carbon\Carbon::now()->format('m'), array('class' => 'chosen-select' , 'style' => 'width:222px;')) !!}
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="font-noraml">Select Year</label>
                        <div class="input-group">
                            {!! Form::select('year', ['2014' => '2014', '2015' => '2015', '2016' => '2016'  ],  Carbon\Carbon::now()->format('Y'), array('class' => 'chosen-select' , 'style' => 'width:222px;')) !!}
                        </div>
                    </div>

                    <div class="form-group" style="padding: 20px">
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="ibox-title">
                <h5>{{$date}} | Cost and Revenue Comparison</h5>
            </div>

            <!-- <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <canvas id="canvas" width="930%" height="444px"></canvas>
                </div>
            </div> -->
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div>
                        <canvas id="canvas" height="333px" width="930%"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript" src="{{ URL::asset('components/js/ChartNew.js') }}"></script>
<!-- <script type="text/javascript" src="{{ URL::asset('components/js/Chart.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('components/js/chartjs-demo.js') }}"></script> -->

    <script>
        var linedata = {
            labels: {!! json_encode($trucks) !!},
            graphTitle : "Sinus - Cosinus",
            datasets : [
                {
                    label: "Cost",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data:   {!! json_encode($costs) !!}
                },
                {
                    label: "Revenue",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: {!! json_encode($revenue) !!}
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
            graphTitle : "RKT Monthly Cost Revenue Comparison",
            graphTitleFontSize: 18,
            bezierCurve: false,
            responsive: true
        }
    </script>

    <script>
        window.onload = function() {
            new Chart(document.getElementById("canvas").getContext("2d")).Bar(linedata, opt1);
        }
    </script>
@endsection