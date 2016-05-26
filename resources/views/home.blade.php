@extends('layouts.master')

@section('breadcrumb')
 @if(Auth::user()->isAdmin() || Auth::user()->isUser())
        @if (Route::currentRouteName() === 'home')
            <ol class="breadcrumb">
                <li class="active">
                    <strong>Home</strong>
                </li>
            </ol>

        @elseif (Route::currentRouteName() === 'process.ondayForm')
             <ol class="breadcrumb">
                <li>
                    <a href="/home">Home</a>
                </li>
                <li class="active">
                    <strong>On Day</strong>
                </li>
            </ol>

        @elseif (Route::currentRouteName() === 'process.maintenanceForm')
            <ol class="breadcrumb">
                <li>
                    <a href="/home">Home</a>
                </li>
                <li class="active">
                    <strong>Maintainance</strong>
                </li>
            </ol>

        @elseif (Route::currentRouteName() === 'process.nilForm')
            <ol class="breadcrumb">
                <li>
                    <a href="/home">Home</a>
                </li>
                <li class="active">
                    <strong>Off Day</strong>
                </li>
            </ol>

        @endif
    @endif


@endsection

@section('content') 
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-success pull-right">Monthly</span>
                    <h5>Income</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">40 886,200</h1>
                    <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                    <small>Total income</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-right">Annual</span>
                    <h5>Orders</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">275,800</h1>
                    <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                    <small>New orders</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-right">Today</span>
                    <h5>Vistits</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">106,120</h1>
                    <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                    <small>New visits</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-danger pull-right">Low value</span>
                    <h5>User activity</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">80,600</h1>
                    <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
                    <small>In first month</small>
                </div>
            </div>
        </div>
    </div>

     <div class="row">
        <div class="col-lg-9">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>RKT Fare and Market Fare Comparison</h5>
                    <div ibox-tools=""></div>
                </div>
                
                <div class="ibox-content">
                    <div>
                        <canvas id="lineChart" height="175" width="894" style="width: 447px; height: 140px;"></canvas>
                    </div>
                </div>

                <div class="ibox-title">
                    <h5 style="text-align: center">RKT Monthly Cost Revenue Comparison</h5>
                    <div ibox-tools=""></div>
                </div>

                <div class="ibox-content">
                    <div>
                        <canvas id="barChart" height="175" width="894" style="width: 447px; height: 140px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Select Month and Year</h5>
                    <div ibox-tools=""></div>
                </div>
                
                <div class="ibox-content">
                    {!! Form::open(array('class' => 'form-group' , 'id' => 'home_graphs')) !!}
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form-group">
                        <label class="font-noraml">Select Month</label>
                        <div class="input-group">
                            {!! Form::select('month',['1'=>'January', '2'=>'February', '3'=>'March', '4'=>'April', '5'=>'May', '6'=>'June', '7'=>'July', '8'=>'August', '9'=>'September', '10'=>'October', '11'=>'November', '12'=>'Decembers'], Carbon\Carbon::now()->format('m'), array('class' => 'chosen-select' , 'id' => 'month' , 'style' => 'width:200px;')) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="font-noraml">Select Year</label>
                        <div class="input-group">
                            {!! Form::select('year', ['2014' => '2014', '2015' => '2015', '2016' => '2016'  ],  Carbon\Carbon::now()->format('Y'), array('class' => 'chosen-select' , 'id' => 'year', 'style' => 'width:200px;')) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $("#home_graphs").submit(function(e) {
        //e.preventDefault();
        var fare_comparison_data;
        var month = $("#month option:selected").val();
        var year = $("#year option:selected").val();
        var url1 = "/api/report/price-comparison?type=api_call&month=" + month + "&year=" + year; // the script where you handle the form input.
        // console.log(url);
        $.ajax({
               type: "POST",
               url: url1,
               data: $("#home_graphs").serialize(), // serializes the form's elements.
               success: function(data)
               {
                   window.fare_comparison_data = data;
                   console.log("fare comp data: " ); // show response from the php script.
                   console.log(data);


                    var lineData = {
                        labels: data.dates,
                        datasets: [
                            {
                                label: "RKT Fare",
                                fillColor: "rgba(220,220,220,0.5)",
                                strokeColor: "rgba(220,220,220,1)",
                                pointColor: "rgba(220,220,220,1)",
                                pointStrokeColor: "#fff",
                                pointHighlightFill: "#fff",
                                pointHighlightStroke: "rgba(220,220,220,1)",
                                data:  window.fare_comparison_data.fare
                            },
                            
                            {
                                label: "Market Fare",
                                fillColor: "rgba(26,179,148,0.5)",
                                strokeColor: "rgba(26,179,148,0.8)",
                                highlightFill: "rgba(26,179,148,0.75)",
                                highlightStroke: "rgba(26,179,148,1)",
                                data: window.fare_comparison_data.market_rate
                            }
                        ]
                    };

                    var lineOptions = {
                        scaleShowGridLines: true,
                        scaleGridLineColor: "rgba(0,0,0,.05)",
                        scaleGridLineWidth: 1,
                        bezierCurve: true,
                        bezierCurveTension: 0.4,
                        pointDot: true,
                        pointDotRadius: 4,
                        pointDotStrokeWidth: 1,
                        pointHitDetectionRadius: 20,
                        datasetStroke: true,
                        legend : true,
                        datasetStrokeWidth: 2,
                        datasetFill: true,
                        responsive: true,
                    };

                    var ctx = document.getElementById("lineChart").getContext("2d");
                    var myNewChart = new Chart(ctx).Line(lineData, lineOptions);
               }
            });
            
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });

        $("#home_graphs").submit(function(e) {
            //e.preventDefault();
            var monthly_cost_revenue_data;
            var month = $("#month option:selected").val();
            var year = $("#year option:selected").val();
            var url2 = "/api/report/monthly-cost-revenue?type=api_call&month=" + month + "&year=" + year; // the script where you handle the form input.
            // console.log(url);
            $.ajax({
                   type: "POST",
                   url: url2,
                   data: $("#home_graphs").serialize(), // serializes the form's elements.
                   success: function(data)
                   {
                        window.monthly_cost_revenue_data = data;
                       console.log(data); // show response from the php script.

                       var barData = {
                            labels: window.monthly_cost_revenue_data.trucks,
                            datasets: [
                                {
                                    label: "Cost",
                                    fillColor: "rgba(220,220,220,0.5)",
                                    strokeColor: "rgba(220,220,220,0.8)",
                                    highlightFill: "rgba(220,220,220,0.75)",
                                    highlightStroke: "rgba(220,220,220,1)",
                                    data: window.monthly_cost_revenue_data.costs
                                },
                                {
                                    label: "Revenue",
                                    fillColor: "rgba(26,179,148,0.5)",
                                    strokeColor: "rgba(26,179,148,0.8)",
                                    highlightFill: "rgba(26,179,148,0.75)",
                                    highlightStroke: "rgba(26,179,148,1)",
                                    data: window.monthly_cost_revenue_data.revenue
                                }
                            ]
                        };

                        var barOptions = {
                            scaleBeginAtZero: true,
                            scaleShowGridLines: true,
                            scaleGridLineColor: "rgba(0,0,0,.05)",
                            scaleGridLineWidth: 1,
                            barShowStroke: true,
                            barStrokeWidth: 2,
                            barValueSpacing: 5,
                            legend : true,
                            barDatasetSpacing: 1,
                            responsive: true,
                        }

                        var ctg = document.getElementById("barChart").getContext("2d");
                        var myChart = new Chart(ctg).Bar(barData, barOptions);
                   }
                });
                
                e.preventDefault(); // avoid to execute the actual submit of the form.
            });
         

    </script>

    <!-- For charts -->
    <script type="text/javascript" src="{{ URL::asset('components/js/ChartNew.js') }}"></script> 
    
@endsection

