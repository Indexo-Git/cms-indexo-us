@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-modern">
                <div class="card-body">
                    @include('app.includes.datatable', [
                        'tableID' => 'categories-list',
                        'routeNew' => 'new-category',
                        'newTranslation' => 'categories.add',
                        'columns' => ['categories.image','categories.name','categories.view','categories.views'],
                        'columnSize' => [10,40,30,5],  // Total must be 85
                        'filterBy' => ['categories.name'],
                        'records' => $categories,
                        'properties' => [
                            [
                                'type' => 'image',
                                'imagePath' => 'categories/meta'
                            ],
                            [
                                'type' => 'url',
                                'route' => 'pages',
                                'param' => 'url',
                                'anchor' => 'name'
                            ],
                            [
                                'type' => 'property',
                                'property' => 'view',
                            ],
                            [
                                'type' => 'count',
                                'relation' => 'views'
                            ],
                        ],
                        'options' => [
                            [
                                'href' => 'edit-category',
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
                        'modelTranslation' => 'categories.model',
                        'routeActions' => 'actions-category',
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
               'tableID' => 'categories-list',
               'modelTranslation' => 'categories.model',
               'routeActions' => 'actions-category',
               'deleteQuestion' => 'categories.delete-question'
           ])

            $('#categories-list tbody').on( 'click', '.delete', function () {
                @include('app.includes.scripts.sweet-delete', [
                    'modelTranslation' => 'categories.model',
                    'deleteQuestion' => 'categories.delete-question'
                ])
            });
        }(jQuery));
    </script>
@endsection
