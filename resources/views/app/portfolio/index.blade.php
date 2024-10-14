@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-modern">
                <div class="card-body">
                    @include('app.includes.datatable', [
                        'tableID' => 'portfolio-list',
                        'routeNew' => 'new-portfolio',
                        'newTranslation' => 'portfolios.add',
                        'columns' => ['portfolios.image','portfolios.title-portfolio','portfolios.location','forms.date'],
                        'columnSize' => [10,40,20,15],  // Total must be 85
                        'filterBy' => ['portfolios.title-portfolio','portfolios.location','forms.date'],
                        'records' => $portfolios,
                        'properties' => [
                            [
                                'type' => 'image',
                                'imagePath' => 'portfolios/carousel',
                                'imageNumber' => 1
                            ],
                            [
                                'type' => 'url',
                                'route' => 'single',
                                'param' => 'url',
                                'anchor' => 'title'
                            ],
                            [
                                'type' => 'property',
                                'property' => 'location',
                            ],
                            [
                                'type' => 'property',
                                'property' => 'date',
                            ],
                        ],
                        'options' => [
                            [
                                'href' => 'edit-portfolio',
                                'button' => 'btn-default mr-1',
                                'icon' => 'bx-edit-alt'
                            ],
                            [
                                'href' => '#',
                                'class' => 'delete',
                                'button' => 'btn-danger',
                                'icon' => 'bx-trash-alt'
                            ]
                        ],
                        'modelTranslation' => 'portfolios.model',
                        'routeActions' => 'actions-portfolio',
                        'actions' => ['delete' => 'datatables.delete']
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
              'tableID' => 'portfolio-list',
              'modelTranslation' => 'portfolios.model',
              'routeActions' => 'actions-portfolio',
              'deleteQuestion' => 'portfolios.delete-question'
            ])

            $('#portfolio-list tbody').on( 'click', '.delete', function () {
                @include('app.includes.scripts.sweet-delete', [
                    'modelTranslation' => 'portfolios.model',
                    'deleteQuestion' => 'portfolios.delete-question'
                ])
            });
        }(jQuery));
    </script>
@endsection
