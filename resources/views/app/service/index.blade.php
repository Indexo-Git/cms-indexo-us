@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-modern">
                <div class="card-body">
                    @include('app.includes.datatable', [
                        'tableID' => 'services-list',
                        'routeNew' => 'new-service',
                        'newTranslation' => 'services.add',
                        'columns' => ['services.image','services.name','services.meta-title','services.views'],
                        'columnSize' => [10,40,30,5],  // Total must be 85
                        'filterBy' => ['services.name'],
                        'records' => $services,
                        'properties' => [
                            [
                                'type' => 'image',
                                'imagePath' => 'services/meta'
                            ],
                            [
                                'type' => 'url',
                                'route' => 'pages',
                                'param' => 'url',
                                'anchor' => 'name'
                            ],
                            [
                                'type' => 'property',
                                'property' => 'meta_title',
                            ],
                            [
                                'type' => 'count',
                                'relation' => 'views'
                            ],
                        ],
                        'options' => [
                            [
                                'href' => 'edit-service',
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
                        'modelTranslation' => 'services.model',
                        'routeActions' => 'actions-service',
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
               'tableID' => 'services-list',
               'modelTranslation' => 'services.model',
               'routeActions' => 'actions-service',
               'deleteQuestion' => 'services.delete-question'
           ])

            $('#services-list tbody').on( 'click', '.delete', function () {
                @include('app.includes.scripts.sweet-delete', [
                    'modelTranslation' => 'services.model',
                    'deleteQuestion' => 'services.delete-question'
                ])
            });
        }(jQuery));
    </script>
@endsection
