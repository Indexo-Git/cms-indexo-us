@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-modern">
                <div class="card-body">
                    <div class="datatables-header-footer-wrapper">
                        <div class="datatable-header">
                            <div class="row align-items-center mb-3">
                                <div class="col-12 col-lg-auto mb-3 mb-lg-0">
                                    @if($states)
                                        <a href="{{ route('new-zone') }}" class="btn btn-primary btn-md font-weight-semibold btn-py-2 px-4">+ Agregar zona</a>
                                    @else
                                        <div class="alert-warning">Debes crear al menos un estado para crear una zona</div>
                                    @endif
                                </div>
                                <div class="col-4 col-lg-auto ms-auto ml-auto ps-lg-1 mb-3 mb-lg-0">
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
                                            <input type="text" class="search-term form-control" name="search-term" id="search-term" placeholder="Buscar zona">
                                            <button class="btn btn-default" type="submit"><i class="bx bx-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="zonea-list" class="table table-ecommerce-simple table-hover mb-0">
                            <thead>
                            <tr>
                                <th class="w-5">
                                    <label for="select-all" class="sr-only"></label>
                                    <input id="select-all" type="checkbox" name="select-all" class="select-all checkbox-style-1 p-relative top-2">
                                </th>
                                <th class="w-40">Nombre</th>
                                <th class="w-30">Estados</th>
                                <th class="w-15">Precio</th>
                                <th class="w-10">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($zones as $zone)
                                    <tr>
                                        <td>
                                            <label for="checkbox-zone-{{ $zone->id }}" class="sr-only"></label>
                                            <input id="checkbox-zone-{{ $zone->id }}" type="checkbox" name="zoneCheckbox[]" value="{{ $zone->id }}" class="checkbox-style-1 zone-checkbox p-relative top-2">
                                        </td>
                                        <td>{{ $zone->name }}</td>
                                        <td>{{ $zone->states->count() }}</td>
                                        <td>{{ $zone->price }}</td>
                                        <td>
                                            <a href="{{ route('edit-zone', $zone->id) }}" data-toggle="tooltip" data-original-title="Editar zona">
                                                <button type="button" class="btn btn-sm btn-default mr-1"><i class="bx bx-edit-alt"></i></button>
                                            </a>
                                            <a id="{{ $zone->id }}" href="#" data-toggle="tooltip" data-original-title="Eliminar" class="delete">
                                                <button type="button" class="btn btn-sm btn-danger"><i class="bx bx-trash-alt"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr class="solid mt-5 opacity-4">
                        <div class="datatable-footer">
                            <div class="row align-items-center justify-content-between mt-3">
                                <div class="col-md-auto order-1 mb-3 mb-lg-0">
                                    <form id="actions-zone" method="POST" action="{{ route('actions-zone') }}" class="d-flex align-items-stretch">
                                        @csrf
                                        <div class="d-grid gap-3 d-md-flex justify-content-md-end me-4">
                                            <label for="action-type" class="sr-only"></label>
                                            <select id="action-type" class="form-control select-style-1 bulk-action" name="action">
                                                <option disabled selected>Acciones en masa</option>
                                                <option value="block">Bloquear</option>
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
            * zone's DataTable List
            */
            let zonesListDataTableInit = function() {

                let $zonesListTable = $('#zones-list');

                $zonesListTable.dataTable({
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
                        emptyTable: "No hay zonas registradas",
                        info: "Mostrando página _PAGE_ de _PAGES_",
                        infoEmpty: "Sin zonas disponibles",
                        infoFiltered: "(filtrando de un total de _MAX_ zonas",
                        lengthMenu: "Mostrar _MENU_ por página",
                        search: "Buscar",
                        zeroRecords: "No hay zonas que coincidan con la búsqueda.",
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
                        $zonesListTable
                            .closest('.dataTables_wrapper')
                            .find('.dataTables_info')
                            .appendTo( $zonesListTable.closest('.datatables-header-footer-wrapper').find('.results-info-wrapper') );

                        // Move dataTables pagination to footer of table
                        $zonesListTable
                            .closest('.dataTables_wrapper')
                            .find('.dataTables_paginate')
                            .appendTo( $zonesListTable.closest('.datatables-header-footer-wrapper').find('.pagination-wrapper') );

                        $zonesListTable.closest('.datatables-header-footer-wrapper').find('.pagination').addClass('pagination-modern pagination-modern-spacing justify-content-center');
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
                $zonesListTable.find( '.select-all' ).on('change', function(){
                    if( this.checked ) {
                        $zonesListTable.find( 'input[type="checkbox"]:not(.select-all)' ).prop('checked', true);
                    } else {
                        $zonesListTable.find( 'input[type="checkbox"]:not(.select-all)' ).prop('checked', false);
                    }
                })

                let formActions = $('#actions-zone');

                $('#submit-actions').on('click', function(){
                    $('input[name="id[]').remove();
                    $zonesListTable.find('.zone-checkbox').each( function(index,element){
                        if(element.checked) $(formActions).append($('<input>').attr('type', 'hidden').attr('name', 'id[]').val(element.value));
                    });
                    let actionVal = $('#action-type').val();
                    if(actionVal){
                        if(actionVal === 'delete'){
                            Swal.fire({
                                title: "¿Estás seguro?",
                                text: "Esta acción borrará múltiples zonas y no podrás recuperarlas.",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonText: 'Sí, proceder.',
                                cancelButtonText: 'Cancelar'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    formActions.submit();
                                } else {
                                    Swal.fire('Se detuvo la operación.')
                                }
                            });
                        } else{
                            formActions.submit();
                        }
                    }
                });
            };

            zonesListDataTableInit();

            $('#zones-list tbody').on( 'click', '.delete', function () {
                let url = '{{ route("delete-zone", ":id") }}';
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "Una vez borrada, no podrás recuperar esta zona.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar.',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = url.replace(':id', $(this).attr('id'));
                    } else {
                        Swal.fire('La zona está a salvo.')
                    }
                });
            });

        }(jQuery));
    </script>
@endsection
