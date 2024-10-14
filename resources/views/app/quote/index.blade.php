@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-modern">
                <div class="card-body">
                    @include('app.includes.datatable', [
                        'tableID' => 'quotes-list',
                        'columns' => ['quotes.email','quotes.pages','quotes.content','quotes.forms','quotes.seo','quotes.eCommerce','quotes.invoice','quotes.total','quotes.views','quotes.date'],
                        'columnSize' => [15,10,5,10,5,5,10,10,5,10], // Total must be 85
                        'filterBy' => ['quotes.email'],
                        'records' => $quotes,
                        'properties' => [
                            [
                                'type' => 'property',
                                'property' => 'email',
                            ],
                            [
                                'type' => 'property',
                                'property' => 'pages',
                            ],
                            [
                                'type' => 'property',
                                'property' => 'content',
                            ],
                            [
                                'type' => 'property',
                                'property' => 'forms',
                            ],
                            [
                                'type' => 'property',
                                'property' => 'seo',
                            ],
                            [
                                'type' => 'switch',
                                'property' => 'e-commerce',
                                'conditions' => [
                                    0 => '<i class="bx bx-check text-success" title="' . __('quotes.w-content') . '"></i><span class="hidden">' . __('quotes.w-content') . '</span>',
                                    1 =>  '<i class="bx bx-x text-danger" title="' . __('quotes.wo-content') . '"></i><span class="hidden">' . __('quotes.wo-content') . '</span>'
                                ],
                            ],
                            [
                                'type' => 'switch',
                                'property' => 'invoice',
                                'conditions' => [
                                    0 => '<i class="bx bx-check text-success" title="' . __('quotes.w-content') . '"></i><span class="hidden">' . __('quotes.w-content') . '</span>',
                                    1 =>  '<i class="bx bx-x text-danger" title="' . __('quotes.wo-content') . '"></i><span class="hidden">' . __('quotes.wo-content') . '</span>'
                                ],
                            ],
                            [
                                'type' => 'property',
                                'property' => 'total',
                            ],
                            [
                                'type' => 'property',
                                'property' => 'views',
                            ],
                            [
                                'type' => 'datetime',
                                'property' => 'created_at',
                                'format' => 'd/m/Y'
                            ],
                        ],
                        'options' => [
                            [
                                'href' => '#',
                                'class' => 'delete',
                                'button' => 'btn-danger',
                                'icon' => 'bx-trash-alt'
                            ]
                        ],
                        'modelTranslation' => 'quotes.model',
                        'routeActions' => 'actions-quote',
                        'actions' => ['delete' => 'datatables.delete'],
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
                'tableID' => 'quotes-list',
                'modelTranslation' => 'quotes.model',
                'routeActions' => 'actions-quote',
                'deleteQuestion' => 'quotes.delete-question',
                'order' => ['column' => 10, 'type' => 'desc'],
                'columnDefs' => ['target' => 10, 'type' => 'date'],
            ])

            $('#users-list tbody').on( 'click', '.delete', function () {
                @include('app.includes.scripts.sweet-delete', [
                    'modelTranslation' => 'quotes.model',
                    'deleteQuestion' => 'quotes.delete-question'
                ])
            });
        }(jQuery));
    </script>
@endsection
