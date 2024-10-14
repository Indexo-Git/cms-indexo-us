<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @include('includes.favicon')
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('app/vendor/bootstrap/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('app/vendor/animate/animate.compat.css') }}">
        <link rel="stylesheet" href="{{ asset('app/vendor/animate/animate.compat.css') }}">
        <link rel="stylesheet" href="{{ asset('app/vendor/font-awesome/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('app/vendor/boxicons/css/boxicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('app/vendor/magnific-popup/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('app/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css') }}">
        <link rel="stylesheet" href="{{ asset('app/css/theme.css') }}">
        <link rel="stylesheet" href="{{ asset('app/css/skins/default.css') }}">
        <link rel="stylesheet" href="{{ asset('app/css/custom.css') }}">
        <script src="{{ asset('app/vendor/modernizr/modernizr.js') }}"></script>
        <script src="https://www.google.com/recaptcha/api.js?render={{ env('GOOGLE_RECAPTCHA_PUBLIC') }}"></script>
        @yield('css')
    </head>
    <body>
        <div id="fb-root"></div>
        <div class="auth">
            <section class="body-sign">
                <div class="center-sign">
                    <a href="{{ url('/') }}" class="logo float-left mt-3">
                        @include('app.includes.logo')
                    </a>
                    @yield('content')
                    <p class="text-center mt-3 mb-3">{{ $settings['website_name']->value }} {{ date('Y') }}</p>
                </div>
            </section>
        </div>
        <script src="{{ asset('app/vendor/jquery/jquery.js') }}"></script>
        <script src="{{ asset('app/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
        <script src="{{ asset('app/vendor/popper/umd/popper.min.js') }}"></script>
        <script src="{{ asset('app/vendor/bootstrap/js/bootstrap.js') }}"></script>
        <script src="{{ asset('app/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
        <script src="{{ asset('app/vendor/common/common.js') }}"></script>
        <script src="{{ asset('app/vendor/nanoscroller/nanoscroller.js') }}"></script>
        <script src="{{ asset('app/vendor/magnific-popup/jquery.magnific-popup.js') }}"></script>
        <script src="{{ asset('app/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
        <script src="{{ asset('app/vendor/jquery-validation/jquery.validate.js') }}"></script>
        <script src="{{ asset('app/vendor/jquery-validation/localization/messages_es.js') }}"> </script>
        <script src="{{ asset('app/vendor/select2/js/select2.js') }}"></script>
        <script src="{{ asset('app/vendor/jquery-appear/jquery.appear.js') }}"></script>
        <script src="{{ asset('app/js/theme.js') }}"></script>
        <script src="{{ asset('app/js/theme.init.js') }}"></script>
        <script src="{{ asset('app/js/custom.js') }}"></script>
        @yield('script')
    </body>
</html>
