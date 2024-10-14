<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('web.includes.meta')
        <link rel="stylesheet" href="{{ asset('/web/css/style.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        <link rel="stylesheet" href="{{ asset('/web/css/indexo.css') }}">
        {!! $settings['google_analytics']->value ?: null !!}
        <script src="https://www.google.com/recaptcha/api.js?render={{ env('GOOGLE_RECAPTCHA_PUBLIC') }}"></script>
        @yield('schema')
        <style>
            .grecaptcha-badge{display: none}
        </style>
    </head>
    <body>
        <div class="full-container landing">
            @yield('content')
        </div>
        @include('web.includes.cookies')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/3.0.1/js.cookie.min.js"></script>
        <script src="{{ asset('/web/js/script.min.js') }}"></script>
        @yield('script')
    </body>
</html>
