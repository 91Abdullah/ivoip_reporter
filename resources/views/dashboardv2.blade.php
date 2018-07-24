<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <link rel="shortcut icon" href="{{ asset('storage/favicon.ico') }}">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.min.css">
</head>
<body>
    <div id="app">
    
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="row">
                        <div class="container-fluid content">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h2 class="text-center "><strong>iVoIP Agent Wallboard</strong></h2>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-3 col-xs-6 dash-box">
                                            <div class="row">
                                                <div class="col-lg-4 col-xs-6 img-box">
                                                    <img src="{{ asset("storage/queue.png") }}">
                                                </div>
                                                <div class="col-lg-8 col-xs-6 content-box">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xs-12">
                                                            <span class="small-text">Queue</span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xs-12">
                                                            <span id="queue" class="big-text">0</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-xs-6 dash-box">
                                            <div class="row">
                                                <div class="col-lg-4 col-xs-6 img-box">
                                                    <img src="{{ asset("storage/phone.png") }}") }}">
                                                </div>
                                                <div class="col-lg-8 col-xs-6 content-box">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xs-12">
                                                            <span class="small-text">Total Calls Landed</span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xs-12">
                                                            <span id="total-calls" class="big-text">0</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-xs-6 dash-box">
                                            <div class="row">
                                                <div class="col-lg-4 col-xs-6 img-box">
                                                    <img src="{{ asset("storage/missed-call.png") }}">
                                                </div>
                                                <div class="col-lg-8 col-xs-6 content-box">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xs-12">
                                                            <span class="small-text">Abandoned</span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xs-12">
                                                            <span id="abandoned-calls" class="big-text">0</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-xs-6 dash-box">
                                            <div class="row">
                                                <div class="col-lg-4 col-xs-6 img-box">
                                                   <img src="{{ asset("storage/checkmark.png") }}"> 
                                                </div>
                                                <div class="col-lg-8 col-xs-6 content-box">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xs-12">
                                                            <span class="small-text">Completed</span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xs-12">
                                                            <span id="completed-calls" class="big-text">0</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-3 col-xs-6 dash-box">
                                            <div class="row">
                                                <div class="col-lg-4 col-xs-6 img-box">
                                                    <img src="{{ asset("storage/pause.png") }}">
                                                </div>
                                                <div class="col-lg-8 col-xs-6 content-box">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xs-12">
                                                            <span class="small-text">Avg Hold Time (secs)</span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xs-12">
                                                            <span id="avg-holdtime" class="big-text">0</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-xs-6 dash-box">
                                            <div class="row">
                                                <div class="col-lg-4 col-xs-6 img-box">
                                                    <img src="{{ asset("storage/online-support.png") }}">
                                                </div>
                                                <div class="col-lg-8 col-xs-6 content-box">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xs-12">
                                                            <span class="small-text">Avg Talk Time (secs)</span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xs-12">
                                                            <span id="avg-talktime" class="big-text">0</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-xs-6 dash-box">
                                            <div class="row">
                                                <div class="col-lg-4 col-xs-6 img-box">
                                                    <img src="{{ asset("storage/medium-connection.png") }}">
                                                </div>
                                                <div class="col-lg-8 col-xs-6 content-box">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xs-12">
                                                            <span class="small-text">Service Level (%)</span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xs-12">
                                                            <span id="service-lvl" class="big-text">0</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-xs-6 dash-box">
                                            <div class="row">
                                                <div class="col-lg-4 col-xs-6 img-box">
                                                   <img src="{{ asset("storage/medium-connection.png") }}">
                                                </div>
                                                <div class="col-lg-8 col-xs-6 content-box">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xs-12">
                                                            <span class="small-text">Service Lvl Within (secs)</span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xs-12">
                                                            <span id="service-lvl-within" class="big-text">0</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-3 col-xs-6 dash-box">
                                            <div class="row">
                                                <div class="col-lg-4 col-xs-6 img-box">
                                                    <img src="{{ asset("storage/user.png") }}">
                                                </div>
                                                <div class="col-lg-8 col-xs-6 content-box">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xs-12">
                                                            <span class="small-text">Agents Logged In</span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xs-12">
                                                            <span id="loggedin" class="big-text">0</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-xs-6 dash-box">
                                            <div class="row">
                                                <div class="col-lg-4 col-xs-6 img-box">
                                                    <img src="{{ asset("storage/checked-user-male.png") }}">
                                                </div>
                                                <div class="col-lg-8 col-xs-6 content-box">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xs-12">
                                                            <span class="small-text">Available Agents</span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xs-12">
                                                            <span id="agents-available" class="big-text">0</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-xs-6 dash-box">
                                            <div class="row">
                                                <div class="col-lg-4 col-xs-6 img-box">
                                                    <img src="{{ asset("storage/user-engagement-male.png") }}">
                                                </div>
                                                <div class="col-lg-8 col-xs-6 content-box">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xs-12">
                                                            <span class="small-text">Unavailable Agents</span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xs-12">
                                                            <span id="unavailable-agents" class="big-text">0</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-xs-6 dash-box">
                                            <div class="row">
                                                <div class="col-lg-4 col-xs-6 img-box">
                                                   <img src="{{ asset("storage/waiting-room.png") }}">
                                                </div>
                                                <div class="col-lg-8 col-xs-6 content-box">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xs-12">
                                                            <span class="small-text">Callers waiting</span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xs-12">
                                                            <span id="callers-waiting" class="big-text">0</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-6 col-xs-12 col-lg-offset-3">
                                            <div id="myDiv"></div>
                                        </div>
                                        {{-- <div class="col-lg-6 col-xs-12">
                                            <div id="myDiv2"></div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <footer>
                        <p class="text-center">Made with <i class="fa fa-heart" style="color:red;"></i> by <strong>Abdullah Basit</strong></p>
                    </footer>
                </div>
            </div>
        </div>
        
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Plotly.js -->
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.min.js"></script>
    <script type="text/javascript">
        let route = '{!! route('dashboard.data') !!}';
        let historyServiceLvl = new Array(10);
        let color = '#C8A2C8';
        let defaultColor = '#72CAAF';
        let warningColor = '#FF9800';
        let dangerColor = '#FF0000';
        
        setInterval(loadDashboard, 5000);

        // loadDashboard();

        window.onresize = function() {
            Plotly.Plots.resize('myDiv');
        };

        function loadDashboard() {
            $.ajax({
                url: route,
                type: 'GET',
                data: {
                    _token: '{!! csrf_token() !!}'
                },
                dataType: 'JSON',
                success: function(response) {
                    // console.log(response);
                    $("#queue").text(response.QueueParams.queue);
                    $("#total-calls").text(parseInt(response.QueueParams.abandoned) + parseInt(response.QueueParams.completed));
                    $("#abandoned-calls").text(response.QueueParams.abandoned);
                    $("#completed-calls").text(response.QueueParams.completed);
                    $("#avg-holdtime").text(response.QueueParams.holdtime);
                    $("#avg-talktime").text(response.QueueParams.talktime);
                    $("#service-lvl-within").text(response.QueueParams.servicelevel);
                    $("#service-lvl").text(response.QueueParams.servicelevelperf);

                    //

                    $("#loggedin").text(response.QueueSummary.loggedin);
                    $("#agents-available").text(response.QueueSummary.available);
                    $("#unavailable-agents").text(response.QueueSummary.loggedin - response.QueueSummary.available);
                    $("#callers-waiting").text(response.QueueSummary.callers);

                    //historyServiceLvl[Date.now()] = response.QueueParams.servicelevelperf;

                    // response.QueueParams.servicelevelperf = "39";

                    if(parseInt(response.QueueParams.servicelevelperf) < 60 && 
                        response.QueueParams.servicelevelperf > 40) {
                        color = warningColor;
                        $("#service-lvl").css({'color': '#fff', 'background': warningColor, 'padding':'0 5px'});
                    } else if(parseInt(response.QueueParams.servicelevelperf) < 40) {
                        color = dangerColor;
                        $("#service-lvl").css({'color': '#fff', 'background': dangerColor, 'padding':'0 5px'});
                    } else {
                        color = defaultColor;
                    }

                    let data = [{
                        x: ['Service Level'],
                        y: [response.QueueParams.servicelevelperf/100],
                        type: 'bar',
                        marker: {
                            color: color,
                            line: {
                                width: 2.5
                            }       
                        }
                    }];

                    let layout = {
                        showlegend: false,
                        yaxis: {
                            tickformat: ',.0%',
                            range: [0,1]
                        },
                        title: "Service Level",
                        font: {
                            size: 16
                        }
                    }

                    // let historyData = [{
                    //     x: [Object.keys(historyServiceLvl)],
                    //     y: [historyServiceLvl],
                    //     type: 'scatter'
                    // }];

                    // let historyLayout = {
                    //     showlegend: false,
                    //     xaxis: {
                    //         tickformat: ',.0%',
                    //         range: [0,1]
                    //     }
                    // }

                    Plotly.newPlot('myDiv', data, layout, {staticPlot: true});
                    // Plotly.newPlot('myDiv2', historyData, historyLayout, {staticPlot: true});

                    // console.log(historyData);

                    $.notify("Dashboard Update", "success");
                },
                error: function(xhr, status, error) {
                    $.notify("Error updating dashboard. Please contact Administrator. " + status, "error");
                }
            });
        }
    </script>
</body>
</html>
