@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-modern">
                <div class="card-body">
                    <div class="datatables-header-footer-wrapper">
                        <div class="datatable-header">
                            <div class="row align-items-center mb-3">
                                <div class="col-8 col-lg-auto ms-auto ml-auto mb-3 mb-lg-0">
                                    <div class="d-flex align-items-lg-center flex-column flex-lg-row">
                                        <label for="filter-by" class="ws-nowrap me-3 mb-0">Filtrar por:</label>
                                        <select id="filter-by" class="form-control select-style-1 filter-by" name="filter-by">
                                            <option value="all" selected>Todos</option>
                                            <option value="1">Nombre</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4 col-lg-auto ps-lg-1 mb-3 mb-lg-0">
                                    <div class="d-flex align-items-lg-center flex-column flex-lg-row">
                                        <label for="results-per-page" class="ws-nowrap me-3 mb-0">Mostrar:</label>
                                        <select id="results-per-page" class="form-control select-style-1 results-per-page" name="results-per-page">
                                            <option value="12" selected>12</option>
                                            <option value="24">24</option>
                                            <option value="36">36</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-auto ps-lg-1">
                                    <div class="search search-style-1 search-style-1-lg mx-lg-auto">
                                        <div class="input-group">
                                            <label for="search-term" class="sr-only"></label>
                                            <input type="text" class="search-term form-control" name="search-term" id="search-term" placeholder="Buscar productos">
                                            <button class="btn btn-default" type="submit"><i class="bx bx-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="wishlist" class="table table-ecommerce-simple table-hover mb-0">
                            <thead>
                            <tr>
                                <th class="w-5">
                                    <label for="select-all" class="sr-only"></label>
                                    <input id="select-all" type="checkbox" name="select-all" class="select-all checkbox-style-1 p-relative top-2">
                                </th>
                                <th class="w-10">Imagen</th>
                                <th class="w-30">Nombre</th>
                                <th class="w-10">Precio</th>
                                <th class="w-10">SKU</th>
                                <th class="w-15">Categorías</th>
                                <th class="w-10">Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(Auth::user()->wishlist as $wl)
                                <tr>
                                    <td>
                                        <label for="checkbox-wishlist-{{ $wl->id }}" class="sr-only"></label>
                                        <input id="checkbox-wishlist-{{ $wl->id }}" type="checkbox" name="wishlistCheckbox[]" value="{{ $wl->id }}" class="checkbox-style-1 wishlist-checkbox p-relative top-2">
                                    </td>
                                    <td>
                                        <picture>
                                            <source srcset="{{ asset('public/storage/products/carousel/'.$wl->product->id.'-1.webp') }}" type="image/webp">
                                            <img class="img-thumbnail img-fluid" src="{{ asset('storage/products/carousel/'.$wl->product->id.'-1.jpg') }}" alt="Cat {{ $wl->product->id }}">
                                        </picture>
                                    </td>
                                    <td>
                                        <a href="{{ route('product', $wl->product->url) }}">{{ $wl->product->name }} <i class="bx bx-link-external"></i> </a>
                                    </td>
                                    <td>
                                        @if($wl->product->sale_price)
                                            <del class="text-muted">{{ $wl->product->regular_price }} MXN</del> ${{ $wl->product->sale_price }} MXN
                                        @else
                                            {{ $wl->product->regular_price }} MXN
                                        @endif
                                    </td>
                                    <td>{{ $wl->product->sku }}</td>
                                    <td>
                                        <ul class="list-unstyled">
                                            @foreach($wl->product->categories as $category)
                                                <li>{{ $category->name }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        @if($wl->product->hidden)
                                            <i class="bx bx-hide text-muted" title="Producto oculto"></i>
                                        @endif
                                        @if($wl->product->featured)
                                            <i class="bx bx-rocket text-muted" title="Producto destacado"></i>
                                        @endif
                                        @if($wl->product->new)
                                            <i class="bx bx-certification text-muted" title="Producto nuevo"></i>
                                        @endif
                                        @if($wl->product->virtual)
                                            <i class="bx bx-download text-muted" title="Producto descargable"></i>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <hr class="solid mt-5 opacity-4">
                        <div class="datatable-footer">
                            <div class="row align-items-center justify-content-between mt-3">
                                <div class="col-md-auto order-1 mb-3 mb-lg-0">
                                    <form id="actions-wishlist" method="POST" action="{{ route('actions-wishlist') }}" class="d-flex align-items-stretch">
                                        @csrf
                                        <div class="d-grid gap-3 d-md-flex justify-content-md-end me-4">
                                            <label for="action-type" class="sr-only"></label>
                                            <select id="action-type" class="form-control select-style-1 bulk-action" name="action" style="min-width: 170px;">
                                                <option disabled selected>Acciones en masa</option>
                                                <option value="delete">Borrar</option>
                                            </select>
                                            <button id="submit-actions" type="button" class="bulk-action-apply btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Aplicar</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-auto text-center order-3 order-lg-2">
                                    <div class="results-info-wrapper"></div>
                                </div>
                                <div class="col-lg-auto order-2 order-lg-3 mb-3 mb-lg-0">
                                    <div class="pagination-wrapper"></div>
                                </div>
                            </div>
                        </div>
                    </div>
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

            /*
            * Wishlist's DataTable List
            */
            let wishlistDataTableInit = function() {

                let $wishlistTable = $('#wishlist');

                $wishlistTable.dataTable({
                    dom: '<"row justify-content-between"<"col-auto"><"col-auto">><"table-responsive"t>ip',
                    order: [[ 1, "asc" ]],
                    columnDefs: [
                        {
                            targets: 0,
                            orderable: false,
                        },
                        {
                            targets: [ -1 ],
                            orderable: false,
                            searchable: false
                        }
                    ],
                    responsive : true,
                    pageLength: 12,
                    language: {
                        emptyTable: "No hay productos en tu lista de deseos",
                        info: "Mostrando página _PAGE_ de _PAGES_",
                        infoEmpty: "Sin productos disponibles en tu lista de deseos",
                        infoFiltered: "(filtrando de un total de _MAX_ productos en tu lista de deseos",
                        lengthMenu: "Mostrar _MENU_ por página",
                        search: "Buscar",
                        zeroRecords: "No hay productos en tu lista de deseos que coincidan con la búsqueda.",
                        aria: {
                            sortAscending:  ": activar para ordenar la columna en forma ascendente",
                            sortDescending: ": activar para ordenar la columna en forma descendente"
                        },
                        paginate: {
                            previous: '<i class="fas fa-chevron-left"></i>',
                            next: '<i class="fas fa-chevron-right"></i>',
                        }
                    },
                    drawCallback: function() {

                        // Move dataTables info to footer of table
                        $wishlistTable
                            .closest('.dataTables_wrapper')
                            .find('.dataTables_info')
                            .appendTo( $wishlistTable.closest('.datatables-header-footer-wrapper').find('.results-info-wrapper') );

                        // Move dataTables pagination to footer of table
                        $wishlistTable
                            .closest('.dataTables_wrapper')
                            .find('.dataTables_paginate')
                            .appendTo( $wishlistTable.closest('.datatables-header-footer-wrapper').find('.pagination-wrapper') );

                        $wishlistTable.closest('.datatables-header-footer-wrapper').find('.pagination').addClass('pagination-modern pagination-modern-spacing justify-content-center');
                    }
                });

                // Link "Show" select for change the "pageLength" of dataTable
                $(document).on('change', '.results-per-page', function(){
                    let $this = $(this),
                        $dataTable = $this.closest('.datatables-header-footer-wrapper').find('.dataTable').DataTable();

                    $dataTable.page.len( $this.val() ).draw();
                });

                // Link "Search" field to show results based in the term entered (the "Filter By" is considered to filter the results)
                $(document).on('keyup', '.search-term', function(){
                    let $this = $(this),
                        $filterBy = $this.closest('.datatables-header-footer-wrapper').find('.filter-by'),
                        $dataTable = $this.closest('.datatables-header-footer-wrapper').find('.dataTable').DataTable();

                    if($filterBy.val() === 'all') {
                        $dataTable.search( $this.val() ).draw();
                    } else {
                        $dataTable.column( parseInt( $filterBy.val() ) ).search( $this.val() ).draw();
                    }
                });

                // Trigger "keyup" event when "filter-by" changes
                $(document).on('change', '.filter-by', function(){
                    let $this = $(this),
                        $searchField = $this.closest('.datatables-header-footer-wrapper').find('.search-term');
                    $searchField.trigger('keyup');
                });

                // Select All
                $wishlistTable.find( '.select-all' ).on('change', function(){
                    if( this.checked ) {
                        $wishlistTable.find( 'input[type="checkbox"]:not(.select-all)' ).prop('checked', true);
                    } else {
                        $wishlistTable.find( 'input[type="checkbox"]:not(.select-all)' ).prop('checked', false);
                    }
                })

                let formActions = $('#actions-wishlist');

                $('#submit-actions').on('click', function (){
                    $('input[name="id[]').remove();
                    $wishlistTable.find( '.wishlist-checkbox' ).each( function(index,element){
                        if(element.checked) $(formActions).append($('<input>').attr('type', 'hidden').attr('name', 'id[]').val(element.value));
                    });
                    let actionVal = $('#action-type').val();
                    if(actionVal){
                        if(actionVal === 'delete'){
                            Swal.fire({
                                title: "¿Estás seguro?",
                                text: "Esta acción eliminará los productos de tu lista de deseos.",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonText: 'Sí, proceder.',
                                cancelButtonText: 'Cancelar'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    formActions.submit();
                                } else {
                                    Swal.fire('Los productos continuan en tu lista.')
                                }
                            });
                        } else{
                            formActions.submit();
                        }
                    }
                });
            };

            wishlistDataTableInit();

        }(jQuery));
    </script>
@endsection
