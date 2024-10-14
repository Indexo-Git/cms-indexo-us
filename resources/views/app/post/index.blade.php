@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-modern">
                <div class="card-body">
                    @include('app.includes.datatable', [
                        'tableID' => 'posts-list',
                        'routeNew' => 'new-post',
                        'newTranslation' => 'posts.add',
                        'columns' => ['posts.image','posts.title-post','posts.category','posts.views','posts.status'],
                        'columnSize' => [10,40,25,5,5],  // Total must be 85
                        'filterBy' => ['posts.title-post','posts.category'],
                        'records' => $posts,
                        'properties' => [
                            [
                                'type' => 'image',
                                'imagePath' => 'posts'
                            ],
                            [
                                'type' => 'url',
                                'route' => 'single',
                                'param' => 'url',
                                'anchor' => 'title'
                            ],
                            [
                                'type' => 'relation',
                                'relation' => 'category',
                                'column' => 'name'
                            ],
                            [
                                'type' => 'count',
                                'relation' => 'views'
                            ],
                            [
                                'type' => 'switch',
                                'property' => 'published',
                                'conditions' => [
                                    0 => '<i class="bx bx-x text-danger" title="'.__('posts.draft').'"></i>',
                                    1 => '<i class="bx bx-check text-primary" title="'.__('posts.published').'"></i>'
                                ],
                            ],
                        ],
                        'options' => [
                            [
                                'href' => 'edit-post',
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
                        'modelTranslation' => 'posts.model',
                        'routeActions' => 'actions-post',
                        'actions' => ['publish' => 'posts.publish', 'delete' => 'datatables.delete']
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
                'tableID' => 'posts-list',
                'modelTranslation' => 'posts.model',
                'routeActions' => 'actions-post',
                'deleteQuestion' => 'posts.delete-question'
            ])

            $('#posts-list tbody').on( 'click', '.delete', function () {
                @include('app.includes.scripts.sweet-delete', [
                    'modelTranslation' => 'posts.model',
                    'deleteQuestion' => 'posts.delete-question'
                ])
            });

        }(jQuery));
    </script>
@endsection
