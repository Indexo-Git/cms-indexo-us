@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @php
        // Some useful variables for the view
        $countCalls = $monthlyCalls->count();
        $uniqueCalls = $monthlyCalls->unique('cli_number')->count();
        $uniqueCallsPer100 = $countCalls != 0 ? ($uniqueCalls * 100) / $countCalls : 0;
        $missedCalls = $monthlyCalls->where('dialstatus', 'CANCEL')->count();
        $missedCallsPer100 = $countCalls != 0 ? ($missedCalls * 100) / $countCalls : 0;
        $countMessages = $monthlyMessages->count();
        $leadMessages = $monthlyMessages->where('type', 1)->where('trash', 0)->count();
        $leadMessagesPer100 = $countMessages != 0 ? ($leadMessages * 100) / $countMessages : 0;
        $unreadMessages = $monthlyMessages->where('status_read', 0)->count();
        $trashMessages = $monthlyMessages->where('trash', 1)->count();
        $screenPageViews = $visitorsPageViews->sum('screenPageViews');
        $sumPageViews = $countViewCats + $countViewPosts + $screenPageViews;
        $sumActiveUsers = $visitorsPageViews->sum('activeUsers');
        $viewCatsPer100 = $sumPageViews != 0 ? ($countViewCats * 100) / $sumPageViews : 0;
        $viewPostsPer100 = $sumPageViews != 0 ? ($countViewPosts * 100) / $sumPageViews : 0;
        $usersPer100 = $sumPageViews != 0 ? ($sumActiveUsers * 100) / $sumPageViews : 0;
    @endphp
    <h4><i class="bx bx-calendar"></i> {{ __('dashboard.current-month') }} ({{ date('M') }})</h4>
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <section class="card card-featured-left card-featured-primary mb-4">
                <div class="card-body">
                    <div class="widget-summary widget-summary-md">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-primary">
                                <i class="bx bx-phone-incoming"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <div class="summary mt-1">
                                <h4 class="title fs-5">{{ __('dashboard.total-calls') }}</h4>
                                <div class="info">
                                    <strong class="amount">{{ $countCalls }}</strong>
                                    <span class="text-primary">({{ $missedCalls }} {{ __('dashboard.missed-calls') }})</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-6 col-xl-3">
            <section class="card card-featured-left card-featured-primary mb-4">
                <div class="card-body">
                    <div class="widget-summary widget-summary-md">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-primary">
                                <i class="bx bx-envelope"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <div class="summary mt-1">
                                <h4 class="title fs-5">{{ __('dashboard.messages') }}</h4>
                                <div class="info">
                                    <strong class="amount">{{ $countMessages }}</strong>
                                    <span class="text-primary">({{ $unreadMessages }} {{ __('dashboard.unread-messages') }})</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-6 col-xl-3">
            <section class="card card-featured-left card-featured-primary mb-4">
                <div class="card-body">
                    <div class="widget-summary widget-summary-md">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-primary">
                                <i class="bx bx-stopwatch"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <div class="summary mt-1">
                                <h4 class="title fs-5">{{ __('dashboard.calls-total-duration') }}</h4>
                                <div class="info">
                                    <strong class="amount">{{ formatMinutesSeconds($monthlyCalls->sum('duration')) }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-6 col-xl-3">
            <section class="card card-featured-left card-featured-primary mb-4">
                <div class="card-body">
                    <div class="widget-summary widget-summary-md">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-primary">
                                <i class="bx bx-show"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <div class="summary mt-1">
                                <h4 class="title fs-5">{{ __('dashboard.total-views') }}</h4>
                                <div class="info">
                                    <strong class="amount">{{ $sumPageViews }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <h5 class="text-muted"><i class="bx bx-stats"></i> {{ __('dashboard.stats') }}</h5>
    <div class="row">
        <div class="col-md-2">
            <div class="row">
                <div class="col-12">
                    <section class="card mb-4" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('dashboard.unique-calls-rate-description')}}">
                        <div class="card-body">
                            <div class="circular-bar circular-bar-xs m-0 mt-1 me-4 mb-0 float-end">
                                <div class="circular-bar-chart" data-percent="{{ $uniqueCallsPer100 }}" data-plugin-options='{ "barColor": "{{ $settings['color_primary']->value }} ", "delay": 300, "size": 50, "lineWidth": 5 }'>
                                    <strong>{{ __('dashboard.unique-calls-rate')}}</strong>
                                    <label><span class="percent">{{ $uniqueCallsPer100 }}</span>%</label>
                                </div>
                            </div>
                            <div class="h4 font-weight-bold mb-0">{{ $uniqueCalls }}</div>
                            <p class="text-3 mb-0">{{ __('dashboard.unique-calls-rate')}}</p>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="row">
                <div class="col-12">
                    <section class="card mb-4" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('dashboard.missed-calls-rate-description')}}">
                        <div class="card-body">
                            <div class="circular-bar circular-bar-xs m-0 mt-1 me-4 mb-0 float-end">
                                <div class="circular-bar-chart" data-percent="{{ $missedCallsPer100  }}" data-plugin-options='{ "barColor": "{{ $settings['color_primary']->value }} ", "delay": 300, "size": 50, "lineWidth": 5 }'>
                                    <strong>{{ __('dashboard.missed-calls-rate')}}</strong>
                                    <label><span class="percent">{{ $missedCallsPer100  }}</span>%</label>
                                </div>
                            </div>
                            <div class="h4 font-weight-bold mb-0">{{ $missedCalls }}</div>
                            <p class="text-3 mb-0">{{ __('dashboard.missed-calls-rate')}}</p>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="row">
                <div class="col-12">
                    <section class="card mb-4" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('dashboard.leads-messages-rate-description')}}">
                        <div class="card-body">
                            <div class="circular-bar circular-bar-xs m-0 mt-1 me-4 mb-0 float-end">
                                <div class="circular-bar-chart" data-percent="{{ $leadMessagesPer100  }}" data-plugin-options='{ "barColor": "{{ $settings['color_primary']->value }} ", "delay": 300, "size": 50, "lineWidth": 5 }'>
                                    <strong>{{ __('dashboard.leads-messages-rate')}}</strong>
                                    <label><span class="percent">{{ $leadMessagesPer100  }}</span>%</label>
                                </div>
                            </div>
                            <div class="h4 font-weight-bold mb-0">{{ $leadMessages }}</div>
                            <p class="text-3 mb-0">{{ __('dashboard.leads-messages-rate')}}</p>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="row">
                <div class="col-12">
                    <section class="card mb-4" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('dashboard.services-page-engagement-description')}}">
                        <div class="card-body">
                            <div class="circular-bar circular-bar-xs m-0 mt-1 me-4 mb-0 float-end">
                                <div class="circular-bar-chart" data-percent="{{ $viewCatsPer100  }}" data-plugin-options='{ "barColor": "{{ $settings['color_primary']->value }} ", "delay": 300, "size": 50, "lineWidth": 5 }'>
                                    <strong>{{ __('dashboard.services-page-engagement')}}</strong>
                                    <label><span class="percent">{{ $viewCatsPer100  }}</span>%</label>
                                </div>
                            </div>
                            <div class="h4 font-weight-bold mb-0">{{ $countViewCats }}</div>
                            <p class="text-3 mb-0">{{ __('dashboard.services-page-engagement')}}</p>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="row">
                <div class="col-12">
                    <section class="card mb-4" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('dashboard.services-page-engagement-description')}}">
                        <div class="card-body">
                            <div class="circular-bar circular-bar-xs m-0 mt-1 me-4 mb-0 float-end">
                                <div class="circular-bar-chart" data-percent="{{ $viewPostsPer100  }}" data-plugin-options='{ "barColor": "{{ $settings['color_primary']->value }} ", "delay": 300, "size": 50, "lineWidth": 5 }'>
                                    <strong>{{ __('dashboard.services-page-engagement-engagement')}}</strong>
                                    <label><span class="percent">{{ $viewPostsPer100  }}</span>%</label>
                                </div>
                            </div>
                            <div class="h4 font-weight-bold mb-0">{{ $countViewPosts }}</div>
                            <p class="text-3 mb-0">{{ __('dashboard.blog-posts-engagement')}}</p>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="row">
                <div class="col-12">
                    <section class="card mb-4" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('dashboard.active-users-rate-description')}}">
                        <div class="card-body">
                            <div class="circular-bar circular-bar-xs m-0 mt-1 me-4 mb-0 float-end">
                                <div class="circular-bar-chart" data-percent="{{ $usersPer100  }}" data-plugin-options='{ "barColor": "{{ $settings['color_primary']->value }} ", "delay": 300, "size": 50, "lineWidth": 5 }'>
                                    <strong>{{ __('dashboard.active-users-rate')}}</strong>
                                    <label><span class="percent">{{ $usersPer100  }}</span>%</label>
                                </div>
                            </div>
                            <div class="h4 font-weight-bold mb-0">{{ $sumActiveUsers }}</div>
                            <p class="text-3 mb-0">{{ __('dashboard.active-users-rate')}}</p>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <h4><i class="bx bx-calendar"></i> {{ __('dashboard.current-year') }} ({{ date('Y') }})</h4>
    <div class="row">
        <div class="col-lg-4 mb-4">
            <h5 class="text-muted"><i class="bx bx-phone-incoming"></i> {{ __('dashboard.monthly-calls') }}</h5>
            <div id="callsByMonthChart" class="chart chart-sm" data-sales-rel="{{ __('dashboard.monthly-calls') }}"></div>
            <script>
                let callsByMonthData = [
                    {
                        data: [
                            @foreach($callsByMonth as $month => $calls)
                            [{{  mktime(0, 0, 0, $month, 1, date('Y')) * 1000 }}, {{ $calls }} ],
                            @endforeach
                        ],
                        label : "{{ __('dashboard.monthly-calls') }}",
                        color: "{{ $settings['color_primary']->value }} ",
                        labelFormatter: 'string'
                    }
                ];
            </script>
        </div>
        <div class="col-lg-4 mb-4">
            <h5 class="text-muted"><i class="bx bx-envelope"></i> {{ __('dashboard.monthly-messages') }}</h5>
            <div id="messagesByMonthChart" class="chart chart-sm" data-sales-rel="{{ __('dashboard.monthly-messages') }}"></div>
            <script>
                let messagesByMonthData = [
                    {
                        data: [
                                @foreach($messagesByMonth as $month => $messages)
                            [{{  mktime(0, 0, 0, $month, 1, date('Y')) * 1000 }}, {{ $messages }}],
                            @endforeach
                        ],
                        label : "{{ __('dashboard.monthly-messages') }}",
                        color: "{{ $settings['color_primary']->value }} ",
                        labelFormatter: 'string'
                    }
                ];
            </script>
        </div>
        <div class="col-lg-4 mb-4">
            <h5 class="text-muted"><i class="bx bx-barcode"></i> {{ __('dashboard.monthly-quotes') }}</h5>
            <div id="quotesByMonthChart" class="chart chart-sm" data-sales-rel="{{ __('dashboard.monthly-quotes') }}"></div>
            <script>
                let quotesByMonthData = [
                    {
                        data: [
                                @foreach($quotesByMonth as $month => $quotes)
                            [{{  mktime(0, 0, 0, $month, 1, date('Y')) * 1000 }}, {{ $quotes }}],
                            @endforeach
                        ],
                        label : "{{ __('dashboard.monthly-messages') }}",
                        color: "{{ $settings['color_primary']->value }} ",
                        labelFormatter: 'string'
                    }
                ];
            </script>
        </div>
    </div>
    <h4>{{ __('dashboard.qualified-leads') }}</h4>
    <div class="row">
        <div class="col-md-6 col-xl-4 mb-4">
            <section>
                <div>
                    <div class="widget-summary widget-summary-md">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon">
                                <i class="bx bxs-magic-wand text-muted"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <div class="summary mt-1">
                                <h4 class="title fs-4 text-muted">{{ __('dashboard.under-construction') }}</h4>
                                <div class="info">
                                    <strong class="amount text-muted">{{ __('dashboard.under-construction-description') }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('app/vendor/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('app/vendor/flot.tooltip/jquery.flot.tooltip.js') }}"></script>
    <script src="{{ asset('app/vendor/flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('app/vendor/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('app/vendor/jquery.easy-pie-chart/jquery.easypiechart.js') }}"></script>
    <script>
        (function($) {
            let options = {
                series: {
                    lines: { show: true },
                    points: { show: true }
                },
                xaxis: {
                    mode: "time",
                    timeBase: "milliseconds",
                    timeformat: "%m/%y"
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

            $.plot('#callsByMonthChart', callsByMonthData, options);
            $.plot('#messagesByMonthChart', messagesByMonthData, options);
            $.plot('#quotesByMonthChart', quotesByMonthData, options);
        }).apply(this, [jQuery]);
    </script>
@endsection
