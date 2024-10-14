<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $settings['website_name']->value }}</title>
        <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' xml:space='preserve' width='18px' height='20px' version='1.1' style='shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd' viewBox='0 0 71.14 87.26' xmlns:xlink='http://www.w3.org/1999/xlink'><path fill='DodgerBlue' d='M41.68 10.56l0.03 11.32c3.54,0.13 6.63,2.07 8.35,4.93 0.33,-0.03 0.67,-0.05 1.01,-0.05 3.72,-0.01 6.98,1.97 8.77,4.95 0.34,-0.04 0.69,-0.06 1.05,-0.06 5.62,-0.01 10.19,4.53 10.21,10.16 0.01,5.61 0.03,11.22 0.04,16.83 0.04,15.76 -12.7,28.58 -28.47,28.62 -8.1,0.02 -15.77,-3.36 -21.21,-9.36 -0.54,-0.6 -1.05,-1.21 -1.54,-1.85l-16.74 -20.18c-0.18,-0.16 -0.35,-0.33 -0.51,-0.5 -3.72,-3.94 -3.4,-9.81 0.01,-13.83 0.93,-1.09 2.08,-1.96 3.4,-2.53 4.81,-2.1 10.36,0.17 15.32,3.31l-0.08 -31.71c-0.01,-0.13 -0.01,-0.26 -0.01,-0.39 -0.02,-5.63 4.53,-10.21 10.16,-10.22 5.63,-0.01 10.2,4.54 10.22,10.16 0,0.14 0,0.27 -0.01,0.4zm-10.2 -5.27c2.71,-0.01 4.91,2.18 4.92,4.89 0,0.09 0,0.18 -0.01,0.27l0.06 21.08c0.27,-2.45 2.34,-4.36 4.86,-4.37 2.71,-0.01 4.91,2.18 4.92,4.89 0,0.09 0,0.19 -0.01,0.28l0.01 3.98c0.31,-2.4 2.36,-4.26 4.85,-4.27 2.71,0 4.91,2.19 4.92,4.9 0,0.09 0,0.18 -0.01,0.27 0.01,1.1 0.02,3.12 0.02,4.09 0.01,0.81 -0.02,0.53 0.03,0.01 0.27,-2.45 2.34,-4.37 4.86,-4.37 2.7,-0.01 4.9,2.18 4.91,4.88 0.01,5.61 0.03,11.22 0.04,16.84 0.04,12.84 -10.35,23.28 -23.19,23.31 -6.85,0.02 -13.01,-2.92 -17.28,-7.62 -0.46,-0.52 -0.9,-1.04 -1.32,-1.59l-17.08 -20.59c-0.16,-0.13 -0.32,-0.27 -0.47,-0.43 -1.81,-1.92 -1.51,-4.76 0.2,-6.78 4.31,-5.07 15.29,4.18 20,7.81l-0.11 -42.29c0,-0.09 -0.01,-0.18 -0.01,-0.28 0,-2.7 2.19,-4.91 4.89,-4.91z'/></svg>">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <div class="row text-center py-5">
            <div class="col-5 mx-auto my-5 py-5">
                @include('app.includes.logo', ['class' => 'img-fluid'])
                <h2 class="mt-3 fs-3 text-muted">{{ $settings['maintenance_heading']->value }}</h2>
            </div>
        </div>
    </body>
</html>
