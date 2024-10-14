@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="row">
        @if(count($totalVisitors) || count($searchConsoleData))
            <div class="col-xl-6">
                @if(count($searchConsoleData))
                    <section class="card">
                        <div class="card-body">
                            <h2 class="card-title">{{ __('analytics.organic-average-position') }}</h2>
                            <hr>
                            <div id="avgPositionChart" class="chart chart-sm" data-sales-rel="{{ __('analytics.organic-average-position') }}"></div>
                            <script>
                                let avgPositionData = [
                                    {
                                        data: [
                                            @foreach($searchConsoleData as $sCD)
                                                [{{ $sCD['date']->timestamp * 1000 }}, {{ $sCD['organicGoogleSearchAveragePosition'] }}],
                                            @endforeach
                                        ],
                                        label : "{{ __('analytics.organic-average-position') }}",
                                        color: "#e8710a",
                                        labelFormatter: 'string'
                                    }
                                ];
                            </script>
                        </div>
                    </section>
                @endif
                @if(count($totalVisitors))
                    <section class="card">
                        <div class="card-body">
                            <h2 class="card-title">{{ __('analytics.visitors') }}</h2>
                            <hr>
                            <p id="choices-visitors"></p>
                            <div id="totalVisitorsChart" class="chart chart-sm" data-sales-rel="{{ __('analytics.total-visitors') }}"></div>
                            <script>
                                let totalVisitorsData = {
                                    "{{ strtolower(str_replace(' ', '', __('analytics.screen-page-views'))) }}": {
                                        label: "{{ __('analytics.screen-page-views') }}",
                                        color: "#4285f4",
                                        data: [
                                                @foreach($totalVisitors as $totalVisitor)
                                            [{{ $totalVisitor['date']->timestamp * 1000 }}, {{ $totalVisitor['screenPageViews'] }}],
                                            @endforeach
                                        ]
                                    },
                                    "{{ strtolower(str_replace(' ', '', __('analytics.active-users'))) }}": {
                                        label: "{{ __('analytics.active-users') }}",
                                        color: "#5e35b1",
                                        data: [
                                                @foreach($totalVisitors as $totalVisitor)
                                            [{{ $totalVisitor['date']->timestamp * 1000 }}, {{ $totalVisitor['activeUsers'] }}],
                                            @endforeach
                                        ]
                                    }
                                };
                            </script>
                        </div>
                    </section>
                @endif
                @if(count($searchConsoleData))
                    <section class="card">
                        <div class="card-body">
                            <h2 class="card-title">{{ __('analytics.organic-avg-pos-click-imp') }}</h2>
                            <hr>
                            <p id="choices-clicks-positions"></p>
                            <div id="SearchConsoleChart" class="chart chart-sm" data-sales-rel="{{ __('analytics.avg-pos-click-imp') }}"></div>
                            <script>
                                let searchConsoleData = {
                                    "{{ strtolower(str_replace(' ', '', __('analytics.organic-clicks'))) }}": {
                                        label: "{{ __('analytics.organic-clicks') }}",
                                        color: "#4285f4",
                                        data: [
                                                @foreach($searchConsoleData as $sCD)
                                            [{{ $sCD['date']->timestamp * 1000 }}, {{ $sCD['organicGoogleSearchClicks'] }}],
                                            @endforeach]
                                    },
                                    "{{ strtolower(str_replace(' ', '', __('analytics.organic-impressions'))) }}": {
                                        label: "{{ __('analytics.organic-impressions') }}",
                                        color: "#5e35b1",
                                        data: [
                                                @foreach($searchConsoleData as $sCD)
                                            [{{ $sCD['date']->timestamp * 1000 }}, {{ $sCD['organicGoogleSearchImpressions'] }}],
                                            @endforeach]
                                    }
                                };
                            </script>
                        </div>
                    </section>
                @endif
            </div>
        @endif
        @if(count($pageViews))
            <div class="col-xl-6">
                <section class="card">
                    <div class="card-body">
                        <h2 class="card-title">{{ __('analytics.page-views') }}</h2>
                        <hr>
                        <table class="table table-responsive-md table-striped mb-0">
                            <thead>
                            <tr>
                                <th>{{ __('analytics.page-title') }}</th>
                                <th>{{ __('analytics.active-users') }}</th>
                                <th>{{ __('analytics.screen-page-views') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pageViews as $pageView)
                                <tr>
                                    <td>{{ $pageView['pageTitle'] }}</td>
                                    <td>{{ $pageView['activeUsers'] }}</td>
                                    <td>{{ $pageView['screenPageViews'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        @endif
    </div>
@endsection

@section('js')
    <script src="{{ asset('app/vendor/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('app/vendor/flot.tooltip/jquery.flot.tooltip.js') }}"></script>
    <script src="{{ asset('app/vendor/flot/jquery.flot.time.js') }}"></script>
    <script>
        (function($) {
            'use strict';

            let optionsAVG = {
                series: {
                    lines: { show: true },
                    points: { show: true }
                },
                xaxis: {
                    mode: "time",
                    timeBase: "milliseconds"
                },
                yaxis: {
                    position: "left",
                    transform: function(v) {
                        return -v;
                    },
                    inverseTransform: function(v) {
                        return -v;
                    }
                },
                grid: {
                    hoverable: true,
                    clickable: true,
                    borderColor: 'rgba(0,0,0,0.1)',
                    borderWidth: 1,
                    labelMargin: 15,
                    backgroundColor: 'transparent'
                },
                tooltip: true,
                tooltipOpts: {
                    content: '%y.0',
                    defaultTheme: false
                },
                legend: {
                    show: false
                }
            };

            $.plot('#avgPositionChart', avgPositionData, optionsAVG);

            let options = {
                series: {
                    lines: {
                        show: true,
                        fill: true,
                        lineWidth: 1
                    },
                    points: {
                        show: true
                    },
                    shadowSize: 0
                },
                grid: {
                    hoverable: true,
                    clickable: true,
                    borderColor: 'rgba(0,0,0,0.1)',
                    borderWidth: 1,
                    labelMargin: 15,
                    backgroundColor: 'transparent'
                },
                yaxis: {
                    min: 0,
                    tickDecimals: 0,
                },
                xaxis: {
                    mode: "time",
                    timeBase: "milliseconds"
                },
                tooltip: true,
                tooltipOpts: {
                    content: '%y.0',
                    defaultTheme: false
                }
            };

            let choiceVisitorsContainer = $("#choices-visitors");
            $.each(totalVisitorsData, function(key, val) {
                choiceVisitorsContainer.append("<input type='checkbox' name='" + key +
                    "' checked='checked' class='me-1' id='id" + key + "'></input>" +
                    "<label class='me-2' for='id" + key + "'>"
                    + val.label + "</label>");
            });

            let choiceClickPositions = $("#choices-clicks-positions");
            $.each(searchConsoleData, function(key, val) {
                choiceClickPositions.append("<input type='checkbox' name='" + key +
                    "' checked='checked' class='me-1' id='id" + key + "'></input>" +
                    "<label class='me-2' for='id" + key + "'>"
                    + val.label + "</label>");
            });

            choiceVisitorsContainer.find("input").click(function() {
                plotVisitorsData();
            });
            choiceClickPositions.find("input").click(function() {
                plotsearchConsoleData();
            });

            function plotVisitorsData() {
                console.log('enter');
                let data = [];
                choiceVisitorsContainer.find("input:checked").each(function () {
                    let key = $(this).attr("name");
                    if (key && totalVisitorsData[key]) {
                        data.push(totalVisitorsData[key]);
                    }
                });
                if (data.length > 0) {
                    $.plot("#totalVisitorsChart", data, options);
                }
            }

            function plotsearchConsoleData() {
                console.log('enter');
                let data = [];
                choiceClickPositions.find("input:checked").each(function () {
                    let key = $(this).attr("name");
                    if (key && searchConsoleData[key]) {
                        data.push(searchConsoleData[key]);
                    }
                });
                if (data.length > 0) {
                    $.plot("#SearchConsoleChart", data, options);
                }
            }

            plotVisitorsData();
            plotsearchConsoleData();

        }).apply(this, [jQuery]);
    </script>
@endsection
