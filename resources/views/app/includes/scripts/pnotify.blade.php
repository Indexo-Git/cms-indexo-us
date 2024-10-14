@if (session('success'))
    new PNotify({
    title: '{{ __('pnotify.excellent') }}',
    text: '{{ __(session('success')) }}',
    type: 'success',
    addclass: 'stack-bottomright',
    stack: {"dir1": "up", "dir2": "left", "firstpos1": 15, "firstpos2": 15}
    });
@endif

@if(session('error'))
    new PNotify({
    title: '{{ __('pnotify.error') }}',
    text: '{{ __(session('error')) }}',
    type: 'error',
    addclass: 'stack-bottomright',
    stack: {"dir1": "up", "dir2": "left", "firstpos1": 15, "firstpos2": 15}
    });
@endif
