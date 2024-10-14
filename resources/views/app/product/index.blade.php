@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-modern">
                <div class="card-body">
                    @include('app.includes.datatable', [
                        'tableID' => 'products-list',
                        'routeNew' => 'new-product',
                        'newTranslation' => 'products.add',
                        'columns' => ['products.image','products.name','products.price', 'products.sku','products.categories','products.views'],
                        'columnSize' => [10,35,10,10,15,5],  // Total must be 85
                        'filterBy' => ['products.name','products.price','products.sku','products.categories'],
                        'records' => $products,
                        'properties' => [
                            [
                                'type' => 'image',
                                'imagePath' => 'products/carousel',
                                'imageNumber' => 1,
                            ],
                            [
                                'type' => 'url',
                                'route' => 'product',
                                'param' => 'url',
                                'anchor' => 'name'
                            ],
                            [
                                'type' => 'price',
                                'sale_price' => 'sale_price',
                                'regular_price' => 'regular_price'
                            ],
                            [
                                'type' => 'property',
                                'property' => 'sku',
                            ],
                            [
                                'type' => 'relation',
                                'relations' => 'categories',
                                'column' => 'name'
                            ],
                            [
                                'type' => 'property',
                                'property' => 'views',
                            ]
                        ],
                        'options' => [
                            [
                                'href' => 'edit-product',
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
                        'modelTranslation' => 'products.model',
                        'routeActions' => 'actions-product',
                        'actions' => ['hide' => 'products.hide', 'new' => 'products.new', 'delete' => 'datatables.delete'],
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
                'tableID' => 'products-list',
                'modelTranslation' => 'products.model',
                'routeActions' => 'actions-product',
                'deleteQuestion' => 'products.delete-question'
            ])

            $('#products-list tbody').on( 'click', '.delete', function () {
                @include('app.includes.scripts.sweet-delete', [
                    'modelTranslation' => 'products.model',
                    'deleteQuestion' => 'products.delete-question'
                ])
            });
        }(jQuery));
    </script>
@endsection
