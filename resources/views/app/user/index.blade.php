@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-modern">
                <div class="card-body">
                    @include('app.includes.datatable', [
                        'tableID' => 'users-list',
                        'routeNew' => 'new-user',
                        'newTranslation' => 'users.add',
                        'columns' => ['users.name','users.email','users.type','users.status'],
                        'columnSize' => [30,35,5,5], // Total must be 85
                        'filterBy' => ['users.name','users.email'],
                        'records' => $users,
                        'properties' => [
                            [
                                'type' => 'property',
                                'property' => 'name',
                            ],
                            [
                                'type' => 'property',
                                'property' => 'email',
                            ],
                            [
                                'type' => 'switch',
                                'property' => 'is_admin',
                                'conditions' => [
                                    0 => '<i class="bx bx-user text-success" title="' . __('users.client') . '"></i><span class="hidden">' . __('users.client') . '</span>',
                                    1 =>  '<i class="bx bx-star text-warning" title="' . __('users.admin') . '"></i><span class="hidden">' . __('users.admin') . '</span>'
                                ],
                            ],
                            [
                                'type' => 'switch',
                                'property' => 'blocked',
                                'conditions' => [
                                    0 => null,
                                    1 => '<i class="bx bx-block text-danger" title="' . __('users.blocked') . '"></i><span class="hidden">' . __('users.blocked') . '</span>',
                                ],
                            ]
                        ],
                        'options' => [
                            [
                                'href' => 'edit-user',
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
                        'modelTranslation' => 'users.model',
                        'routeActions' => 'actions-user',
                        'actions' => ['block' => 'users.block', 'delete' => 'datatables.delete'],
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
                'tableID' => 'users-list',
                'modelTranslation' => 'users.model',
                'routeActions' => 'actions-user',
                'deleteQuestion' => 'users.delete-question'
            ])

            $('#users-list tbody').on( 'click', '.delete', function () {
                @include('app.includes.scripts.sweet-delete', [
                    'modelTranslation' => 'users.model',
                    'deleteQuestion' => 'users.delete-question'
                ])
            });
        }(jQuery));
    </script>
@endsection
