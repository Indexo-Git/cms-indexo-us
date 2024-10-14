<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <title>{{ $settings['website_name']->value }}</title>
    <style>
        /* Global styles */
        body {
            margin: 0;
            padding: 0;
            font-size: 16px;
            color: #212f36;
            font-weight: 300;
        }

        /* Container styles */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Logo styles */
        .logo {
            text-align: center;
        }

        .logo img {
            max-width: 300px;
        }

        /* Title styles */
        h2 {
            text-align: center;
        }

        /* Proposition styles */
        .proposition {
            margin-top: 20px;
            text-align: center;
        }

        /* Information styles */
        h3 {
            text-align: center;
        }

        /* List styles */
        ul {
            list-style: none;
            padding: 0;
            margin-top: 10px;
        }

        ul li {
            margin-bottom: 5px;
        }

        /* Signature styles */
        .signature {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="logo">
        <img src="{{ asset('logo/logo.svg') }}" alt="{{ $settings['website_name']->value }}" width="300">
    </div>
    @yield('content')
    <div class="signature">
        <p><a href="{{ route('index') }}">{{ $settings['website_name']->value }}</a> {{ date('Y') }}</p>
    </div>
</div>
</body>
</html>
