<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('web.includes.meta')
        <link rel="stylesheet" href="{{ asset('/web/css/style.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/web/css/indexo.css') }}">
        @if(!Auth::check())
            {!! $settings['google_analytics']->value ?: null !!}
        @endif
        <script src="https://www.google.com/recaptcha/api.js?render={{ env('GOOGLE_RECAPTCHA_PUBLIC') }}"></script>
        @yield('schema')
    </head>
    <body>
        <div class="full-container">
            @include('web.includes.header')
            @yield('content')
            @include('web.includes.footer')
        </div>
        @include('web.includes.cookies')
        <a id="mobile-phone" class="btn-common br-type radius-50 d-md-none" aria-label="Call us" href="tel:+1{{ preg_replace('/[^0-9]/', '', $settings['phone']->value) }}" style="display: none">
            <i class="fa fa-phone"></i> {{ preg_replace('/[^0-9]/', '', $settings['phone']->value) }}
        </a>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/3.0.1/js.cookie.min.js"></script>
        <script src="{{ asset('/web/js/script.min.js') }}"></script>
        <script>
            window.onscroll = function() {scrollFunction()};
            function scrollFunction() {
                let mobilePhone = document.getElementById("mobile-phone");
                if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
                    mobilePhone.style.display = "block";
                } else {
                    mobilePhone.style.display = "none";
                }
            }
        </script>
        @yield('script')
    </body>
</html>
