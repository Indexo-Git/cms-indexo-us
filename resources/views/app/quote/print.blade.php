<html>
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('app/vendor/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('app/css/invoice-print.css') }}">
    <style>
        .logo.logo-hand{width: 45px;;margin-left: 2px;}
        .logo.logo-text{width: 170px;}
        .logo-blue{fill:#3880ff;}
        .logo-gray{fill:#424242;}
    </style>
</head>
<body>
@include('app.quote.body')
<script>
    window.print();
</script>
</body>
</html>
