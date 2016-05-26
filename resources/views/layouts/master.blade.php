<!DOCTYPE html>
<html>
<head>
    <title>Rubaiyat Kamal Transport - @yield('title')</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="/assets/js/jquery-2.1.1.js"></script>    

    <link rel='shortcut icon' href='/image/rkt.png' type='image/png'/ >

    <!-- Google Font: Open Sans -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,800,800italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald:400,300,700"> -->

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Data Tables -->
    <link href="/assets/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/assets/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="/assets/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

    <link href="/assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/assets/css/plugins/chosen/chosen.css" rel="stylesheet">
    <link href="/assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="/assets/css/animate.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">

    <!-- Sweet Alert! -->

    <script src="/bower_components/sweetalert-master/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/bower_components/sweetalert-master/dist/sweetalert.css">

</head>

<div class="js">
    <div id="preloader"></div>
    <body class="">
        <div id="wrapper">
            <nav class="navbar-default navbar-static-side" role="navigation">
                @if (Auth::check())
                    <div class="sidebar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="nav-header">
                                <div class="dropdown profile-element" align="center">
                                    <span>
                                        <img alt="image" width="28%" class="img-responsive" src="/image/rkt.png" />
                                    </span>
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                        <span class="clear">
                                            <span class="block m-t-xs">
                                                <strong class="font-bold">{!!Auth::user()->name!!}</strong>
                                            </span>
                                            <span class="text-muted text-xs block">{!!Auth::user()->type!!}
                                            </span>
                                        </span>
                                    </a>
                                </div>
                                <div class="logo-element">
                                    RKT
                                </div>
                            </li>
                            <li class="{{ Request::is('home') ? 'active' : '' }}">
                                <a href="/home">
                                    <i class="fa fa-home"></i>
                                    <span class="nav-label">Home</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('showactivity') ? 'active' : '' }}">
                                <a href="/showactivity">
                                    <i class="fa fa-th-large"></i>
                                    <span class="nav-label">Activity</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('report/*') ? 'dropdown active' : 'dropdown' }}">
                                <a href="#">
                                    <i class="fa fa-bar-chart-o"></i>
                                    <span class="nav-label">Reports</span>
                                    <span class="fa fa-angle-right pull-right"></span>
                                </a>
                                <ul class="nav nav-second-level">
                                    <li ><a href="#">Detailed Truck Report</a></li>
                                    <li class="{{ Request::is('report/price-comparison') ? 'active' : '' }}">
                                        <a href="/report/price-comparison">Fare Comparison</a>
                                    </li>
                                    <li><a href="#">Maintenance Report</a></li>
                                    <li class="{{ Request::is('report/monthly-cost-revenue') ? 'active' : '' }}">
                                        <a href="/report/monthly-cost-revenue">Monthly Cost-Revenue</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="{{ Request::is('car-status') ? 'active' : '' }}">
                                <a href="/car-status">
                                    <i class="fa fa-truck"></i>
                                    <span class="nav-label">Car Status</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('activity-list') ? 'active' : '' }}">
                                <a href="/activity-list?month={{ Carbon\Carbon::now()->format('m')}}&year={{ Carbon\Carbon::now()->format('Y')}}">
                                    <i class="fa fa-list"></i>
                                    <span class="nav-label">Activity List</span>
                                </a>
                            </li>
                            @if(Auth::user()->isAdmin())
                                <li class="{{ Request::is('users') ? 'active' : '' }}">
                                    <a href="/users">
                                        <i class="fa fa-user"></i>
                                        <span class="nav-label">Users</span>
                                    </a>
                                </li>

                                <li class="{{ Request::is('hr/*') ? 'dropdown active' : 'dropdown' }}">
                                    <a href="#">
                                        <i class="fa fa-users"></i>
                                        <span class="nav-label">HR</span>
                                        <span class="fa fa-angle-right pull-right"></span>
                                    </a>
                                    <ul class="nav nav-second-level">
                                        <li class="{{ Request::is('hr/employee') ? 'active' : '' }}">
                                            <a href="/hr/employee">Profile</a>
                                        </li>
                                        <li class="{{ Request::is('hr/salary_sheet') ? 'active' : '' }}">
                                            <a href="/hr/salary_sheet">Salary</a>
                                        </li>
                                    </ul>
                                </li>

                            @endif
                        </ul>
                    </div>
                @endif
            </nav>

            <div id="page-wrapper" class="gray-bg">
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                        <div class="navbar-header">
                            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#">
                                <i class="fa fa-arrow-circle-left"></i>
                            </a>
                        </div>
                        <ul class="nav navbar-top-links navbar-right">
                            <li class="pull-right">
                                <a href="/auth/logout">
                                    <i class="fa fa-sign-out"></i> Log out
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                
                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-sm-4" style="font-size: 13px; margin-top: 17px">
                        @yield('breadcrumb')
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="wrapper wrapper-content">
                            @yield('content')
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <div align="center">
                        <strong>Rubaiyat Kamal Transport </strong>&copy; 2016 - 2017
                    </div>
                </div>
            </div>
        </div>

        <!-- Mainly scripts -->
      
        <script src="/assets/js/bootstrap.min.js"></script>
        <script src="/assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="/assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

        <!-- Data Tables -->
        <script src="/assets/js/plugins/dataTables/jquery.dataTables.js"></script>
        <script src="/assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
        <script src="/assets/js/plugins/dataTables/dataTables.responsive.js"></script>
        <script src="/assets/js/plugins/dataTables/dataTables.tableTools.min.js"></script>

        <!-- Custom and plugin javascript -->
        <script src="/assets/js/inspinia.js"></script>
        <script src="/assets/js/plugins/pace/pace.min.js"></script>
        
        <script src="assets/js/plugins/chartJs/Chart.min.js"></script>
        <script src="assets/js/demo/chartjs-demo.js"></script>

        <!-- Chosen -->
        <script src="/assets/js/plugins/chosen/chosen.jquery.js"></script>

        <!-- Data picker -->
        <script src="/assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
        
        
        

        <!-- Page-Level Scripts -->
        <script>
            $(document).ready(function() {
                $('.dataTables-example').dataTable({
                    "responsive": true,
                    "bPaginate": false,
                    "order": [[ 1, "desc" ]]
                });
                $('#data_1 .input-group.date').datepicker({
                    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    calendarWeeks: true,
                    autoclose: true
                });
                var config = {
                    '.chosen-select'           : {},
                    '.chosen-select-deselect'  : {allow_single_deselect:true},
                    '.chosen-select-no-single' : {disable_search_threshold:10},
                    '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
                    '.chosen-select-width'     : {width:"95%"}
                }
                for (var selector in config) {
                    $(selector).chosen(config[selector]);
                }
            });
        </script>

        <style>
            body.DTTT_Print {
                background: #fff;
            }
            .DTTT_Print #page-wrapper {
                margin: 0;
                background:#fff;
            }
            button.DTTT_button, div.DTTT_button, a.DTTT_button {
                border: 1px solid #e7eaec;
                background: #fff;
                color: #676a6c;
                box-shadow: none;
                padding: 6px 8px;
            }
            button.DTTT_button:hover, div.DTTT_button:hover, a.DTTT_button:hover {
                border: 1px solid #d2d2d2;
                background: #fff;
                color: #676a6c;
                box-shadow: none;
                padding: 6px 8px;
            }
            .dataTables_filter label {
                margin-right: 5px;
            }
        </style>

    </body>
</div>

</html> 

