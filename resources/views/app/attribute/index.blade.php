@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-modern">
                <div class="card-body">
                    @include('app.includes.datatable', [
                        'tableID' => 'attributes-list',
                        'routeNew' => 'new-attribute',
                        'newTranslation' => 'attributes.add',
                        'columns' => ['attributes.name','attributes.characteristics'],
                        'columnSize' => [45,40], // Total must be 85
                        'filterBy' => ['attributes.name','attributes.characteristics'],
                        'records' => $attributes,
                        'properties' => [
                            [
                                'type' => 'property',
                                'property' => 'name',
                            ],
                            [
                                'type' => 'relation',
                                'relations' => 'characteristics',
                                'column' => 'name'
                            ]
                        ],
                        'options' => [
                            [
                                'href' => 'edit-attribute',
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
                        'modelTranslation' => 'attributes.model',
                        'routeActions' => 'actions-attribute',
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
                'tableID' => 'attributes-list',
                'modelTranslation' => 'attributes.model',
                'routeActions' => 'actions-attribute',
                'deleteQuestion' => 'attributes.delete-question'
            ])

            $('#attributes-list tbody').on( 'click', '.delete', function () {
                @include('app.includes.scripts.sweet-delete', [
                 'modelTranslation' => 'attributes.model',
                 'deleteQuestion' => 'attributes.delete-question'
                ])
            });

        }(jQuery));
    </script>
@endsection
