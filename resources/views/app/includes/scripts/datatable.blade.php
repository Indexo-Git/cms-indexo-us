/*
* Custom function to sort dates if present
*/
$.fn.dataTable.ext.type.order['date-pre'] = function (dateString) {
    var parts = dateString.split(' '); // Split date and time
    var dateParts = parts[0].split('-'); // Split the date part into components
    var timeParts = parts[1].split(':'); // Split the time part into components

    // Create a Date object from year, month, day, hour, minute, and second
    // Note: Month is 0-indexed, hence dateParts[0] - 1
    var date = new Date(dateParts[2], dateParts[0] - 1, dateParts[1], timeParts[0], timeParts[1], timeParts[2]);
    return date.getTime(); // Return the time in milliseconds since the Unix Epoch
};

/*
* {{ __($modelTranslation) }}'s DataTable List
*/
let {{ __($modelTranslation) }}sListDataTableInit = function() {

    let ${{ __($modelTranslation) }}sListTable = $('#{{ $tableID }}');

    ${{ __($modelTranslation) }}sListTable.dataTable({
        dom: '<"row justify-content-between"<"col-auto"><"col-auto">><"table-responsive"t>ip',
        order: @isset($order) [[ {{ $order['column'] }}, "{{ $order['type'] }}" ]] @else [[ 1, "asc" ]] @endisset,
        columnDefs: [
        {
            targets: 0,
            orderable: false,
        },
        {
            targets: [ -1 ],
            orderable: false,
            searchable: false
        },
        @isset($columnDefs)
        {
            "type": "{{ $columnDefs['type'] }}",
            "targets": {{ $columnDefs['target'] }}
        }
        @endisset
        ],
        responsive : true,
        pageLength: 12,
        drawCallback: function() {
        // Move dataTables info to footer of table
        ${{ __($modelTranslation) }}sListTable
        .closest('.dataTables_wrapper')
        .find('.dataTables_info')
        .appendTo( ${{ __($modelTranslation) }}sListTable.closest('.datatables-header-footer-wrapper').find('.results-info-wrapper') );
        // Move dataTables pagination to footer of table
        ${{ __($modelTranslation) }}sListTable
        .closest('.dataTables_wrapper')
        .find('.dataTables_paginate')
        .appendTo( ${{ __($modelTranslation) }}sListTable.closest('.datatables-header-footer-wrapper').find('.pagination-wrapper') );
        ${{ __($modelTranslation) }}sListTable.closest('.datatables-header-footer-wrapper').find('.pagination').addClass('pagination-modern pagination-modern-spacing justify-content-center');
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
    ${{ __($modelTranslation) }}sListTable.find( '.select-all' ).on('change', function(){
        if( this.checked ) {
            ${{ __($modelTranslation) }}sListTable.find( 'input[type="checkbox"]:not(.select-all)' ).prop('checked', true);
        } else {
            ${{ __($modelTranslation) }}sListTable.find( 'input[type="checkbox"]:not(.select-all)' ).prop('checked', false);
        }
    })

    @isset($routeActions)
        let formActions = $('#{{ $routeActions }}');

        $('#submit-actions').on('click', function(){
            $('input[name="id[]').remove();
            ${{ __($modelTranslation) }}sListTable.find('.{{ __($modelTranslation) }}-checkbox').each( function(index,element){
                if(element.checked) $(formActions).append($('<input>').attr('type', 'hidden').attr('name', 'id[]').val(element.value));
            });
            let actionVal = $('#action-type').val();
            if(actionVal){
                @isset($deleteQuestion)
                    if(actionVal === 'delete'){
                        Swal.fire({
                            title: "{{ __('sweetalert.are-you-sure') }}",
                            text: "{{ __($deleteQuestion) }}",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: '{{ __('sweetalert.yes-proceed') }}',
                            cancelButtonText: '{{ __('sweetalert.cancel') }}'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                formActions.submit();
                            } else {
                                Swal.fire('{{ __('sweetalert.canceled') }}')
                            }
                        });
                    }
                @else
                    formActions.submit();
                @endisset
            }
        });
    @endisset
};

{{ __($modelTranslation) }}sListDataTableInit();

$(".clickable-row").click(function() {
    window.location = $(this).data("href");
});
