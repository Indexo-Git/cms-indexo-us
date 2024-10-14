@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-modern">
                <div class="card-body">
                    @include('app.includes.datatable', [
                        'tableID' => 'calls-list',
                        'columns' => ['calls.number','calls.start','calls.status', 'calls.duration', 'calls.source'],
                        'columnSize' => [30,20,5,10,20],  // Total must be 85
                        'filterBy' => ['calls.number','calls.start', 'calls.source'],
                        'records' => $calls,
                        'properties' => [
                            [
                                'type' => 'phoneNumber',
                                'number' => 'cli_number',
                                'country' => 'number_country_code'
                            ],
                            [
                                'type' => 'timezone',
                                'property' => 'start',
                            ],
                            [
                                'type' => 'switch',
                                'property' => 'dialstatus',
                                'conditions' => [
                                    'ANSWER' => '<i class="bx bx-phone-incoming text-success fs-4" title="' . __('calls.answered') . '"></i><span class="hidden">' . __('calls.answered') . '</span>',
                                    'CANCEL' =>  '<i class="bx bx-phone-off text-danger fs-4" title="' . __('calls.missed') . '"></i><span class="hidden">' . __('calls.missed') . '</span>'
                                ]
                            ],
                            [
                                'type' => 'timer',
                                'time' => 'duration_answered',
                            ],
                            [
                                'type' => 'property',
                                'property' => 'scenario_name',
                            ]
                        ],
                        'modelTranslation' => 'calls.model'
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        (function($) {
            'use strict';

            @include('app.includes.scripts.pnotify')

            @include('app.includes.scripts.datatable', [
               'tableID' => 'calls-list',
               'modelTranslation' => 'calls.model',
               'order' => ['column' => 1, 'type' => 'desc'],
               'columnDefs' => ['target' => 1, 'type' => 'date'],
           ])
        }(jQuery));
    </script>
@endsection
