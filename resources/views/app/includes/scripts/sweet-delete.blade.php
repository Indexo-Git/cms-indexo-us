let url = '{{ route("delete-".__($modelTranslation), ":id") }}';

Swal.fire({
    title: "{{ __('sweetalert.are-you-sure') }}",
    text: "{{  __($deleteQuestion) }}",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: '{{ __('sweetalert.yes-delete') }}',
    cancelButtonText: '{{ __('sweetalert.cancel') }}'
}).then((result) => {
    if (result.isConfirmed) {
        window.location = url.replace(':id', $(this).attr('id'));
    } else {
        Swal.fire('{{ __('sweetalert.record-safe',['record' => __($modelTranslation)]) }}')
    }
});
