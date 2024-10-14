<html>
    <head>
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('app/vendor/bootstrap/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('app/css/custom.css') }}">
    </head>
    <body>
    <div class="invoice">
        @include('app.order.invoice')
    </div>
    <script>
        window.print();
    </script>
    </body>
</html>
