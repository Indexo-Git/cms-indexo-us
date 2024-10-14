<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @class(['fixed sidebar-light', 'sidebar-left-collapsed' => Route::currentRouteName() == 'messages' || Route::currentRouteName() == 'view-message' || Route::currentRouteName() == 'type-message' || Route::currentRouteName() == 'trash'])>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $settings['website_name']->value ?? 'indexo Shop' }}</title>
        @include('includes.favicon')
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('app/vendor/bootstrap/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('app/vendor/animate/animate.compat.css') }}">
        <link rel="stylesheet" href="{{ asset('app/vendor/font-awesome/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('app/vendor/boxicons/css/boxicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('app/vendor/magnific-popup/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('app/vendor/select2/css/select2.css') }}">
        <link rel="stylesheet" href="{{ asset('app/vendor/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('app/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css') }}">
        <link rel="stylesheet" href="{{ asset('app/vendor/pnotify/pnotify.custom.css') }}">
        <link rel="stylesheet" href="{{ asset('app/vendor/datatables/media/css/dataTables.bootstrap5.css') }}">
        @yield('css')
        <link rel="stylesheet" href="{{ asset('app/css/theme.css') }}">
        <link rel="stylesheet" href="{{ asset('app/css/layouts/modern.css') }}">
        <link rel="stylesheet" href="{{ asset('app/css/skins/default.css') }}">
        <link rel="stylesheet" href="{{ asset('app/css/custom.css') }}">
        <script src="{{ asset('app/vendor/modernizr/modernizr.js') }}"></script>
    </head>
    <body>
    <section class="body">
        @include('app.includes.header')
        <div class="inner-wrapper">
            @include('app.includes.sidebar')
            <section role="main" class="content-body content-body-modern">
                @include('app.includes.breadcrumbs')
                @yield('content')
            </section>
        </div>
    </section>
    <script src="{{ asset('app/vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('app/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="{{ asset('app/vendor/common/common.js') }}"></script>
    <script src="{{ asset('app/vendor/nanoscroller/nanoscroller.js') }}"></script>
    <script src="{{ asset('app/vendor/magnific-popup/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('app/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
    <script src="{{ asset('app/vendor/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ asset('app/vendor/jquery-validation/localization/messages_es.js') }}"> </script>
    <script src="{{ asset('app/vendor/select2/js/select2.js') }}"></script>
    <script src="{{ asset('app/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js') }}"></script>
    <script src="{{ asset('app/vendor/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('app/vendor/datatables/media/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('app/vendor/pnotify/pnotify.custom.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('js')
    <script src="{{ asset('app/js/theme.js') }}"></script>
    <script src="{{ asset('app/js/custom.js') }}"></script>
    <script src="{{ asset('app/js/theme.init.js') }}"></script>
</html>
