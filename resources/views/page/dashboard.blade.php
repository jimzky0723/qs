@extends('tdhlayout.app')

@section('head')
    <link rel="stylesheet" href="{{ url('resources/tdh/css/loader.css') }}" />
@endsection

@section('content')
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>
    <div class="main-content container">
        <div class="row">
            <div class="col-lg-4">
                <div class="widget widget-fullwidth week-chart">
                    <div class="widget-head"><span class="title">Weekly Activity</span></div>
                    <div class="widget-chart-container">
                        <div id="week-chart" style="height: 215px;"></div>
                    </div>
                    <div class="row widget-info">
                        <div class="col-6 counter-block"><span data-toggle="counter" data-end="{{ $countPatient->lastWeek }}" class="counter"></span><span class="title">Last Week</span></div>
                        <div class="col-6 counter-block"><span data-toggle="counter" data-end="{{ $countPatient->percentage }}" data-suffix="%" class="counter">0</span><span class="title">This Week</span></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widget widget-fullwidth ads-chart">
                    <div class="widget-head"><span class="title">Age Bracket</span></div>
                    <div class="ads-resume">
                        <div class="ads-info">
                            <div id="ads-chart-legend" class="ads-legend"></div>
                        </div>
                        <div class="ads-users">
                            <div class="widget-chart-container">
                                <div id="users-chart" style="height: 153px;"></div>
                                <div class="users-chart-counter"><span data-toggle="counter" data-end="{{ $countPatient->month }}" class="users-counter">0</span><span class="users-title">Overall</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-chart-container">
                        <div id="ads-chart" style="height: 229px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="widget-indicators">
                    <div class="indicator-item bg-success" style="color: #fff;">
                        <div class="indicator-item-icon">
                            <div class="icon" style="color: #fff;"><span class="s7-date"></span></div>
                        </div>
                        <div class="indicator-item-value"><span data-toggle="counter" data-end="{{ date('d') }}" class="indicator-value-counter">0</span>
                            <div class="indicator-value-title">{{ date('F') }}, {{ date('Y') }}</div>
                        </div>
                    </div>
                    <div class="indicator-item">
                        <div class="indicator-item-icon">
                            <div class="icon"><span class="s7-users"></span></div>
                        </div>
                        <div class="indicator-item-value"><span data-toggle="counter" data-end="{{ $countPatient->today }}" class="indicator-value-counter">0</span>
                            <div class="indicator-value-title">Today's Patient</div>
                        </div>
                    </div>
                    <div class="indicator-item">
                        <div class="indicator-item-icon">
                            <div class="icon"><span class="s7-display2"></span></div>
                        </div>
                        <div class="indicator-item-value"><span data-toggle="counter" data-end="{{ $countPatient->consulted }}" class="indicator-value-counter">0</span>
                            <div class="indicator-value-title">Patient Consulted</div>
                        </div>
                    </div>
                    <div class="indicator-item">
                        <div class="indicator-item-icon">
                            <div class="icon"><span class="s7-graph3"></span></div>
                        </div>
                        <div class="indicator-item-value"><span data-toggle="counter" data-decimals="0" data-end="{{ $countPatient->week }}" class="indicator-value-counter">0</span>
                            <div class="indicator-value-title">This Week</div>
                        </div>
                    </div>
                    <div class="indicator-item">
                        <div class="indicator-item-icon">
                            <div class="icon"><span class="s7-graph1"></span></div>
                        </div>
                        <div class="indicator-item-value"><span data-toggle="counter" data-decimals="0" data-end="{{ $countPatient->month }}" data-prefix="" class="indicator-value-counter">0</span>
                            <div class="indicator-value-title">This Month</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="widget widget-fullwidth user-develop-chart">
                    <div class="widget-head">
                        <div class="tools"><span class="icon s7-cloud-download"></span><span class="icon s7-refresh-2"></span></div><span class="title">Consultation Activity</span>
                    </div>
                    <div class="widget-chart-container">
                        <div id="develop-chart-legend" class="legend-container"></div>
                        <div id="develop-chart" style="height: 225px;"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script src="{{ url('resources/tdh/') }}/lib/jquery-flot/jquery.flot.js" type="text/javascript"></script>
    <script src="{{ url('resources/tdh/') }}/lib/jquery-flot/jquery.flot.pie.js" type="text/javascript"></script>
    <script src="{{ url('resources/tdh/') }}/lib/jquery-flot/jquery.flot.time.js" type="text/javascript"></script>
    <script src="{{ url('resources/tdh/') }}/lib/jquery-flot/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="{{ url('resources/tdh/') }}/lib/jquery-flot/plugins/jquery.flot.orderBars.js" type="text/javascript"></script>
    <script src="{{ url('resources/tdh/') }}/lib/jquery-flot/plugins/curvedLines.js" type="text/javascript"></script>
    <script src="{{ url('resources/tdh/') }}/lib/jquery-flot/plugins/jquery.flot.tooltip.js" type="text/javascript"></script>
    <script src="{{ url('resources/tdh/') }}/lib/countup/countUp.min.js" type="text/javascript"></script>
    <script src="{{ url('resources/tdh/') }}/js/dashboard.js" type="text/javascript"></script>
    <script type="text/javascript">
        $("#loader-wrapper").show();
        $(document).ready(function(){
            //initialize the javascript
            $.when($.get("{{ url('api/get/data') }}",function(data){
                setTimeout(function(){
                    $("#loader-wrapper").fadeOut(500);
                },2000);
            }))
            .then(function(data){
                App.init();
                console.log(data.weekly);
                App.dashboard(data);

            });
            var url = "{{ url('/') }}";

        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            App.livePreview();
        });

    </script>
@endsection